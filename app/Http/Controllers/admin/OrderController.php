<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

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
        $order = Order::select('orders.*', 'countries.name as countryName')->where('orders.id', $orderId)->leftJoin('countries', 'countries.id', 'orders.country_id')->first();
        $orderItems = OrderItem::where('order_id', $orderId)->get();
        return view('admin.orders.detail', ['order' => $order, 'orderItems' => $orderItems]);
    }
    public function changeOrderStatus(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        $orderItems = OrderItem::where('order_id', $orderId)->get();
        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found']);
        }

        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();

        return view('admin.orders.detail', ['order' => $order, 'orderItems' => $orderItems]);
    }

}
