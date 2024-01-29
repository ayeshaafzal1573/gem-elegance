<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role = 1; // Set the role you want to filter

        $users = User::latest();

        if ($request->has('keyword')) {
            // If 'keyword' is present, filter users based on the 'name' column
            $users->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        // Filter users based on the 'role' column
        $users->where('role', $role);

        $users = $users->get();

        return view("admin.users.list", compact("users"));
    }
}
