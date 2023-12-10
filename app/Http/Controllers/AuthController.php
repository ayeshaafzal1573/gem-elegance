<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
            'password' => 'required|min:5|confirmed',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Registration successful',

            ]);
                return view('front.account.login');
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
               }
            if(session()->has('url.intended')){
                return redirect(session()->get('url.intended'));
    }


        else {
            session()->flash('error', 'Either email/password is incorrect');
            return redirect()->route('account.login');
        }
    }

else{
return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
}
    }
    //USER PROFILE
    public function profile(){
    return view('front.account.profile');
    }
    //USER LOGOUT
public function logout(){
Auth::logout();
return redirect()->route('account.login')->with('success','You sucessfully logout');
}


}

