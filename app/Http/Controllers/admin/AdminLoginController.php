<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function index(){
    return view ('admin.login');
    }
    //ADMIN AUTHENTICATION
   public function authenticate(Request $request)
{
    // Validation
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check if validation passes
    if ($validator->passes()) {
        // Attempt to authenticate
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $admin = Auth::guard('admin')->user();

            // Check if the role is 2 (adjust this condition based on your user roles)
            if ($admin->role == 2) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'You Are Not Authorized to Access Admin Panel.');
            }
        } else {
            // Authentication failed
            return redirect()->route('admin.login')->with('error', 'Either Email/Password is Incorrect');
        }
    } else {
        // Validation failed
        return redirect()->route('admin.login')->withErrors($validator)->withInput($request->only('email'));
    }
}

}
