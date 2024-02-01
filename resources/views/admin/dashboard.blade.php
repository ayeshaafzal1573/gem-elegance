@extends('admin.layouts.app')

@section('content')

  <div class="app-content">

    <div class="app-content-header">
      <h1 class="app-content-headerText">Dashboard</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      <a href="{{route('category.list')}}" hidden>
      <button class="app-content-headerButton">Back</button>
      </a>
    </div>
    <div class="app-content-actions" >
      <div class="app-content-actions-wrapper" hidden>
        <div class="filter-button-wrapper" >
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>


        </div>
        <button class="action-button list active" title="List View" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
<div class="container" id="card-container">
    <div class="row">
<div class="dash-card-main">
    <img src="{{asset('../front-assets/images/order.png')}}" alt="" class="img-fluid">
    <div class="text-container">
        <h5>Total Orders:</h5>
        <p>{{$totalOrders}}</p>
    </div>
</div>
<div class="dash-card-main">
    <img src="{{asset('../front-assets/images/products.png')}}" alt="" class="img-fluid">
    <div class="text-container">
        <h5>Total Products:</h5>
        <p>{{$totalProducts}}</p>
    </div>
</div>
<div class="dash-card-main">
    <img src="{{asset('../front-assets/images/customer.png')}}" alt="" class="img-fluid">
    <div class="text-container">
        <h5>Customers:</h5>
        <p>{{$totalCustomers}}</p>
    </div>
</div>


    </div>
    <div class="row mt-4">
<div class="dash-card-main">
    <img src="{{asset('../front-assets/images/revenue.png')}}" alt="" class="img-fluid">
    <div class="text-container">
        <h5>Total Revenue:</h5>
        <p>Rs: {{number_format($totalRevenue,2)}}</p>
    </div>
</div>
<div class="dash-card-main">
    <img src="{{asset('../front-assets/images/month.png')}}" alt="" class="img-fluid">
    <div class="text-container">
        <h5>Month Revenue:</h5>
        <p>Rs: {{number_format($revenueThisMonth,2)}}</p>
    </div>
</div>

    </div>
    <br>

</div>


@endsection
