<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //USER LOGIN
    public function login()
    {
        return view('front.account.login');
    }
    //USER REGISTER
    public function register()
    {
        return view('front.account.register');
    }
    //USER INSERT
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->save();

            // Redirect to the login page after successful registration
            return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
    // USER AUTHENTICATE THEN GO TO PROFILE
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password], $request->get('remember'))) {
                // Check if the user has items in the cart
                if (Cart::count() > 0) {
                    // Redirect to the cart page
                    return redirect()->route('front.cart');
                } else {
                    // Redirect to the profile page
                    return redirect()->route('account.profile');
                }
            } else {
                session()->flash('error', 'Either email/password is incorrect');
                return redirect()->route('account.login');
            }
        }
    }



    //USER PROFILE
    public function profile()
    {
        $userId = Auth::user()->id;
        $countries = Country::orderBy('name', 'ASC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        $address = CustomerAddress::where('user_id', $userId)->first();
        return view('front.account.profile', ['user' => $user, 'countries' => $countries, 'address' => $address]);
    }
    public function editprofile($id, Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($id);
        $countries = Country::orderBy('name', 'ASC')->get();
        $address = CustomerAddress::where('user_id', $userId)->first();
        if (!empty($user)) {
            return view('front.account.editprofile', ['user' => $user, 'countries' => $countries, 'address' => $address]);
        } else {
            return redirect()->route('account.profile');
        }
    }

    public function updateprofile(Request $request)
    {
        $userId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId . ',id',
            'phone' => 'required',
        ]);

        if ($validator->passes()) {
            // Update user profile here
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();

            return redirect()->route('account.profile');

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function updateAddress(Request $request)
    {
        $userId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customer_addresses,email,' . $userId . ',user_id',
            'mobile' => 'required',
            'address' => 'required',
            'apartment' => 'nullable',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        if ($validator->passes()) {
            // Find the customer address record
            $address = CustomerAddress::where('user_id', $userId)->first();

            // Check if the address record exists
            if ($address) {
                // Update user profile here
                $address->first_name = $request->first_name;
                $address->last_name = $request->last_name;
                $address->email = $request->email;
                $address->mobile = $request->mobile;
                $address->address = $request->address;
                $address->apartment = $request->apartment;
                $address->state = $request->state;
                $address->city = $request->city;
                $address->zip = $request->zip;
                $address->country_id = $request->country;
                $address->save();

                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.profile')->with('error', 'Address not found for the user.');
            }
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    //USER LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login')->with('success', 'You sucessfully logout');
    }
    //USER ORDER INFO
    public function order()
    {
        $data = [];
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        $data['orders'] = $orders;
        return view('front.account.order', $data);
    }
    public function orderDetail($id)
    {
        $data = [];
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $id)->first();
        $data['order'] = $order;
        $orderItems = OrderItem::where('order_id', $id)->get();
        $data['orderItems'] = $orderItems;
        return view('front.account.order-detail', $data);

    }
    public function showchangePasswordForm()
    {

        return view('front.account.change-password');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $user = User::select('id', 'password')->where('id', Auth::user()->id)->first();

            // Check if the old password matches the current password
            if (!Hash::check($request->oldpassword, $user->password)) {
                // Old password is incorrect
                return response()->json([
                    'status' => false,
                    'error' => 'Your old password is incorrect',
                ]);
            }

            // Update the password
            User::where('id', $user->id)->update([
                'password' => Hash::make($request->newpassword),
            ]);

            // Check if the password was successfully updated
            if (Hash::check($request->newpassword, $user->password)) {
                // Password successfully changed
                return response()->json([
                    'status' => true,
                    'message' => 'You have successfully changed your password.',
                ]);
            } else {
                // Something went wrong during the password update
                return response()->json([
                    'status' => false,
                    'error' => 'An error occurred while changing the password.',
                ]);
            }
        } else {
            // Validation failed
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

}

