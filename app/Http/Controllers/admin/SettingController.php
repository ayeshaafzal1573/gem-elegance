<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class SettingController extends Controller
{
    public function showChangePassword()
    {
        return view('admin.changepassword');
    }
    public function processChangePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            $admin = User::find(Auth::guard('admin')->user()->id);

            // Check if the old password matches the current password
            if (!Hash::check($request->oldpassword, $admin->password)) {
                // Old password is incorrect
                return Redirect::back()->withErrors(['Your old password is incorrect']);
            }

            // Use a database transaction for atomicity
            DB::beginTransaction();

            try {
                // Update the password
                $admin->update([
                    'password' => Hash::make($request->newpassword),
                ]);

                // Commit the transaction
                DB::commit();

                return Redirect::back()->with('success', 'You have successfully changed your password.');
            } catch (\Exception $e) {
                // Something went wrong during the password update
                // Roll back the transaction
                DB::rollBack();

                return Redirect::back()->withErrors(['An error occurred while changing the password.']);
            }
        } else {
            // Validation failed
            return Redirect::back()->withErrors($validator->errors());
        }
    }
}
