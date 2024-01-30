@extends('admin.layouts.app')

@section('content')
   <h1>{{$totalOrders}}</h1>
   <h2>{{$totalProducts}}</h2>
   <h3>{{$totalCustomers}}</h3>

   <h4>Rs: {{number_format($totalRevenue,2)}}</h4>
      <h5>{{$revenueThisMonth}}</h5>

@endsection
