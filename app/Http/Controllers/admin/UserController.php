<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest();

        if ($request->has('keyword')) {
            // If 'keyword' is present, filter users based on the 'name' column
            $users->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        $users = $users->get();

        return view("admin.users.list", compact("users"));
    }


}
