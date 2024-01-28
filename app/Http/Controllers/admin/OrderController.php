<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::latest('orders.created_at');
        $orders = $orders->leftJoin('users', 'users.id', 'orders.user_id')->select('orders.*', 'users.name', 'users.email');

        // Check if the 'keyword' parameter is present in the request
        if ($request->has('keyword')) {
            $orders = $orders->where('users.name', 'like', '%' . $request->keyword . '%');
            $orders = $orders->orWhere('users.email', 'like', '%' . $request->keyword . '%');
            $orders = $orders->orWhere('orders.id', 'like', '%' . $request->keyword . '%');

        }
        return view('admin.orders.list', ['orders' => $orders]);

    }
    public function detail($orderId)
    {
        $order = Order::select('orders.*', 'countries.name as countryName')->where('id', $orderId)->leftJoin('countries', 'countries.id', 'orders.country_id')->first();
        return view('admin.orders.detail', ['order' => $order]);
    }
}
