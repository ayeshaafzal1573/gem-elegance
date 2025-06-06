<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\DiscountCoupan;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::with('images')->find($request->id);
        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }

        // Check if the product is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if (!$cartItem->isEmpty()) {
            // Product is already in the cart
            return response()->json([
                'status' => false,
                'message' => 'Product already in cart'
            ]);
        }

        // Extract the image path from the first image
        $imagePath = (!empty($product->images) && $product->images instanceof \Illuminate\Database\Eloquent\Collection && $product->images->isNotEmpty())
            ? asset($product->images->first()->image_path)
            : '';


        // Add the product to the cart
        Cart::add($product->id, $product->name, 1, $product->price, ['images' => $imagePath]);

        return response()->json([
            'status' => true,
            'message' => $product->name . ' product added in cart',
            'productName' => $product->name
        ]);
    }

    public function cart()
    {

        // Get the content of the shopping cart
        $cartContent = Cart::content();

        // Return the 'front.cart' view with the cart content
        return view('front.cart', compact('cartContent'));
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);

        $status = true;
        $message = '';

        if ($qty <= $product->qty) {
            Cart::update($rowId, $qty);
            $message = 'Cart updated successfully';
        } else {
            $status = false;
            $message = 'Requested quantity (' . $qty . ') not available in stock';
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function deleteItem($rowId)
    {
        if (Cart::get($rowId)) {
            // Item exists in the cart, remove it
            Cart::remove($rowId);

            return response()->json([
                'status' => true,
                'message' => 'Item deleted successfully'
            ]);
        } else {
            // Item not found in the cart
            return response()->json([
                'status' => false,
                'message' => 'Item not found in cart'
            ]);
        }
    }


    public function checkout()
    {
        $discount = 0;
        //if cart is empty redirect to cart
        if (Cart::count() == 0) {
            return redirect()->route('front.cart');
        }
        //if user is not logged in the redirect to login page
        if (Auth::check() == false) {
            if (session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);

            }
            return redirect()->route('account.login');
        }

        $customerAddress = CustomerAddress::where('user_id', Auth::user()->id)->first();

        //it will remove index
        session()->forget('url.intended');
        $countries = Country::orderBy('name', 'ASC')->get();
        $subTotal = Cart::subtotal(2, '.', '');
        //APPLY DISCOUNT HERE
        if (session()->has('code')) {
            $discountCoupon = session()->get('code');
            $discount = $discountCoupon->discount_amount;
        }
        //THE STEP AFTER SHIPPING CUSTOMER CALCULATE SHIPPING
        if ($customerAddress != '') {
            $userCountry = $customerAddress->country_id;
            $shippingInfo = Shipping::where('country_id', $userCountry)->first();
            $totalQty = 0;
            $totalShippingCharge = 0;
            $grandtotal = 0;
            foreach (Cart::content() as $item) {
                $totalQty += $item->qty;
            }
            $totalShippingCharge = $totalQty * $shippingInfo->amount;
            $grandtotal = ($subTotal - $discount) + $totalShippingCharge;
        } else {
            $grandtotal = $subTotal;
            $totalShippingCharge = 0;
        }

        return view(
            'front.checkout',
            [
                'countries' => $countries,
                'customerAddress' => $customerAddress,
                'totalShippingCharge' => $totalShippingCharge,
                'grandtotal' => $grandtotal,
                'discount' => $discount
            ]
        );

    }

    public function processCheckout(Request $request)
    {
        // STEP-1 apply validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Please fix the errors',
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // STEP-2 save user address
        $user = Auth::user();
        $userAddress = CustomerAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'country_id' => $request->country,
                'address' => $request->address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ]
        );

        if ($request->payment_method == 'cod') {
            $shipping = 0;
            $discount = 0;
            $subtotal = Cart::subtotal('2', '.', '');

            // Check if there is a discount coupon applied
            if (session()->has('code')) {
                $discountCoupon = session()->get('code');
                $discount = $discountCoupon->discount_amount;
            }

            // Calculate shipping charge
            $shippingInfo = Shipping::where('country_id', $request->country)->first();
            $totalQty = 0;
            foreach (Cart::content() as $item) {
                $totalQty += $item->qty;
            }
            if ($shippingInfo != null) {
                $shipping = $shippingInfo->amount;
            }

            $grandtotal = ($subtotal - $discount) + $shipping;

            $order = new Order;
            $order->subtotal = $subtotal;
            $order->shipping = $shipping;
            $order->discount = $discount;
            $order->grand_total = $grandtotal;
            $order->user_id = $user->id;
            $order->payment_status = 'Not Paid';
            $order->status = 'Pending';
            $order->coupan_code = $discount > 0 ? $discountCoupon->code : null;


            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->mobile = $request->mobile;
            $order->address = $request->address;
            $order->apartment = $request->apartment;
            $order->state = $request->state;
            $order->city = $request->city;
            $order->zip = $request->zip;
            $order->notes = $request->notes;
            $order->country_id = $request->country;
            $order->save();

            // Save order items
            foreach (Cart::content() as $item) {
                $orderItem = new OrderItem;
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->name = $item->name;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->price;
                $orderItem->total = $item->price * $item->qty;
                $orderItem->save();
            }

            // Clear cart after order processing
            Cart::destroy();

            return response()->json([
                'message' => 'Order saved successfully',
                'orderId' => $order->id,
                'status' => true,
                'user_address' => $userAddress,
            ]);
        }
    }

    public function thankyou($id)
    {

        $banners = Banners::all();
        return view('front.thanks   ', ['id' => $id, 'banners' => $banners]);
    }
    public function getOrderSummary(Request $request)
    {
        $subtotal = Cart::subtotal(2, '.', '');
        $discount = 0;

        // Apply discount if available
        if (session()->has('code')) {
            $code = session()->get('code');
            $discount = $code->discount_amount;
        }

        // Calculate shipping charge
        $shippingCharge = 0;

        if ($request->has('country_id') && $request->country_id > 0) {
            $shippingInfo = Shipping::where('country_id', $request->country_id)->first();
            if ($shippingInfo != null) {
                $shippingCharge = $shippingInfo->amount;
            }
        } else {
            $shippingInfo = Shipping::where('country_id', 'restofworld')->first();
            if ($shippingInfo != null) {
                $shippingCharge = $shippingInfo->amount;
            }
        }

        // Calculate grand total after discount and shipping charge
        $grandtotal = $subtotal + $shippingCharge - $discount;

        return response()->json([
            'status' => true,
            'grandtotal' => number_format($grandtotal, 2),
            'discount' => number_format($discount, 2),
            'shippingCharge' => number_format($shippingCharge, 2),
        ]);
    }

    public function applyDiscount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid request data',
            ]);
        }

        $code = DiscountCoupan::where('code', $request->code)->first();

        if ($code == null) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid discount coupon',
            ]);
        }

        $now = Carbon::now();

        if ($code->starts_at != "") {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->starts_at);
            if ($now->lt($startDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon',
                ]);
            }
        }

        if ($code->expires_at != "") {
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->expires_at);
            if ($now->gt($endDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon',
                ]);
            }
        }

        // Get the current cart subtotal
        $subtotal = Cart::subtotal(2, '.', '');

        // Calculate shipping charge
        $shippingCharge = 0;
        if ($request->has('country_id') && $request->country_id > 0) {
            $shippingInfo = Shipping::where('country_id', $request->country_id)->first();
            if ($shippingInfo != null) {
                $shippingCharge = $shippingInfo->amount;
            }
        } else {
            $shippingInfo = Shipping::where('country_id', 'restofworld')->first();
            if ($shippingInfo != null) {
                $shippingCharge = $shippingInfo->amount;
            }
        }

        // Apply discount to the subtotal
        $discount = 0;
        $discount = min($code->discount_amount, $subtotal);

        // Calculate grandtotal
        $grandtotal = $subtotal + $shippingCharge - $discount;

        // Store the discount coupon in the session
        session()->put('code', $code);

        return response()->json([
            'status' => true,
            'message' => 'Discount coupon applied successfully',
            'grandtotal' => number_format($grandtotal, 2),
            'discount' => number_format($discount, 2),
            'shippingCharge' => number_format($shippingCharge, 2),
        ]);
    }

}
