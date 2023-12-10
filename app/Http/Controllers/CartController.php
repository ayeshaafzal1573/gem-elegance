<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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


public function checkout(){
    //if cart is empty redirect to cart
if(Cart::count ()==0){
return redirect()->route('front.cart');
}
//if user is not logged in the redirect to login page
if(Auth::check()==false){
    if(session()->has('url.intended')){
session(['url.intended'=>url()->current()]);

    }
    return redirect()->route('account.login');
}

$customerAddress=CustomerAddress::where('user_id',Auth::user()->id)->first();

//it will remove index
session()->forget('url.intended');
  $countries=Country::orderBy('name','ASC')->get();
//THE STEP AFTER SHIPPING CUSTOMER CALCULATE SHIPPING
if($customerAddress!=''){
$userCountry=$customerAddress->country_id;
$shippingInfo = Shipping::where('country_id', $userCountry)->first();
$totalQty=0;
$totalShippingCharge=0;
$grandtotal=0;
foreach(Cart::content()as $item){
$totalQty+=$item->qty;
}
$totalShippingCharge=$totalQty*$shippingInfo->amount;
$grandtotal=Cart::subtotal(2,'.','')+$totalShippingCharge;
}
else{
$grandtotal=Cart::subtotal(2,'.','');
$totalShippingCharge=0;
}

    return view('front.checkout',
    ['countries'=>$countries,
    'customerAddress'=>$customerAddress,
    'totalShippingCharge'=>$totalShippingCharge,
    'grandtotal'=>$grandtotal]);

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

    // Process the order
    if ($request->payment_method == 'cod') {
        $shipping = 0;
        $discount = 0;
        $subtotal = Cart::subtotal('2', '.', '');
//CALCULATE SHIPPING
        $shippingInfo = Shipping::where('country_id', $request->country)->first();
  $totalQty = 0;
        foreach (Cart::content() as $item) {
            $totalQty += $item->qty;
        }
        if ($shippingInfo != null) {
            $shipping = $shippingInfo->amount;
            $grandtotal = $subtotal + $shipping;
        }
     else {
        $shippingInfo = Shipping::where('country_id', 'restofworld')->first();
            $shipping = $shippingInfo->amount;
            $grandtotal = $subtotal + $shipping;
        }


        $order = new Order;
        $order->subtotal = $subtotal;
        $order->shipping = $shipping;
        $order->grand_total = $grandtotal;
        $order->user_id = $user->id;

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

        // You can also save order items here using Cart::content()
    }
//STEP-4 store order items in order items table
foreach (Cart::content()as $item){
$orderItem=new OrderItem;
$orderItem->product_id=$item->id;
$orderItem->order_id=$order->id;
$orderItem->name=$item->name;
$orderItem->qty=$item->qty;
$orderItem->price=$item->price;
$orderItem->total=$item->price*$item->qty;
$orderItem->save();

}
Cart::destroy();

    return response()->json([
        'message' => 'Order saved successfully',
        'orderId' => $order->id,
        'status' => true,
        'user_address' => $userAddress,
    ]);
}
public function thankyou($id){

return view('front.thanks   ',['id'=>$id]);
}
public function getOrderSummary(Request $request)
{
    $subtotal = Cart::subtotal(2, '.', '');

    $shippingCharge = 0;
    $grandtotal = 0;

    if ($request->has('country_id') && $request->country_id > 0) {
        $shippingInfo = Shipping::where('country_id', $request->country_id)->first();
    $totalQty = 0;
        foreach (Cart::content() as $item) {
            $totalQty += $item->qty;
        }

        if ($shippingInfo != null) {
            $shippingCharge = $shippingInfo->amount;
            $grandtotal = $subtotal + $shippingCharge;
        }
    } else {
        $shippingInfo = Shipping::where('country_id', 'restofworld')->first();

        if ($shippingInfo != null) {
            $shippingCharge = $shippingInfo->amount;
            $grandtotal = $subtotal + $shippingCharge;
        }
    }

    return response()->json([
        'status' => true,
        'grandtotal' => number_format($grandtotal, 2),
        'shippingCharge' => number_format($shippingCharge, 2),
    ]);
}

}

