<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $totalOrders=Order::where("status","!=","cancelled" )->count();
        $totalProducts=Product::count();
        $totalCustomers=User::where("role",1)->count();
        $totalRevenue = Order::where("status", "!=", "cancelled")->sum('grand_total');
        //This Month Revenue
        $startOfMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');

        $currentDate = Carbon::now()->subMonth()->format('Y-m-d');
        ;
        $revenueThisMonth = Order::where("status", "!=", "cancelled")
        ->whereDate('created_at','>=',$startOfMonth)
        ->whereDate('created_at','<=',$currentDate)
        ->sum('grand_total');
        return view('admin.dashboard',
      ['totalOrders'=>$totalOrders,
      'totalProducts' => $totalProducts,
    'totalCustomers' => $totalCustomers,
    'totalRevenue' => $totalRevenue,
    'revenueThisMonth' => $revenueThisMonth,
            ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('front.index');
    }
}
