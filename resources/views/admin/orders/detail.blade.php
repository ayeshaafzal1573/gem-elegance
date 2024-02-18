@extends('admin.layouts.app')

@section('content')
   <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Order Details</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>

    </div>
    <div class="app-content-actions" hidden>

      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper" >
 <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>

        </div>

        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="row mt-5">
<div class="col-md-8">
    <h6>Order ID:</h6>
    <p class="order-input">{{$order->id}}</p>
    <h6>Customer Name:</h6>
    <p class="order-input">{{$order->first_name.' '.$order->last_name}}</p>
    <h6>Shipping Address:</h6>
    <p class="order-input">{{$order->address}}. <br> {{$order->city}},{{$order->countryName}}.</p>
    <h6>Phone No:</h6>
    <p class="order-input">{{$order->mobile}}</p>
    <h6>Email:</h6>
    <p class="order-input">{{$order->email}}</p>
      <h6>Total:</h6>
    <p class="order-input">
   {{number_format($order->grand_total,2)}}
</p>

</div>
<div class="col-md-4" style="border-left: 1px solid #a89482;">
      @foreach ($orderItems as $item)
      <h6>Product Name:</h6>
    <p class="order-input">
   {{$item->name}}
</p>
      <h6>Price:</h6>
    <p class="order-input">
  {{$item->price}}
</p>
      <h6>Quantity:</h6>
    <p class="order-input">
{{$item->qty}}
</p>
      <h6>Total Price:</h6>
    <p class="order-input">
{{ number_format($item->total, 2) }}
</p>

   @endforeach
     <form action="{{ route('orders.changeOrderStatus', $order->id) }}" method="post" name="changeOrderStatusForm" id="changeOrderStatusForm">
   @csrf
        <h6>Order Status:</h6>
    <p class="order-input">
   @csrf
 <select name="status"  class="order-input" style="border: none; background:none; padding:0%; width:100%;">
        <option value="Pending" {{($order->status=='Pending')?'selected':''}}>Pending</option>
        <option value="Shipped" {{($order->status=='Shipped')?'selected':''}}>Shipped</option>
        <option value="Delivered" {{($order->status=='Delivered')?'selected':''}}>Delivered</option>
        <option value="Cancelled" {{($order->status=='Cancelled')?'selected':''}}>Cancelled</option>
    </select>
    <h6>Shipped Date:</h6>
   @if(!empty($order->shipped_date))
    <p class="order-input">
        {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, Y') }}
    </p>
@else
    <p class="order-input">
        <input type="text" name="shipped_date" id="shipped_date" style="background: none; border:none; width:100%">
    </p>
@endif
<button class="app-content-headerButton">Update</button>

    </form>
</p></p>
</div>

    </div>

  </div>
  {{-- SCRIPT --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datetimepicker@2.5.20"></script>

<script>
    $(document).ready(function(){
        $('#shipped_date').datetimepicker({
            format: 'Y-m-d H:i:s',
        });


        });
        $("#changeOrderStatusForm").submit(function(event){
            event.preventDefault();
            $.ajax({
            url:'{{route("orders.changeOrderStatus",$order->id)}}',
            type:'post',
            data:$(this).serializeArray(),
            dataType:'json',
            success:function(response){
if (response.success) {

                window.location.href = response.listPageUrl;
            }
            }
            })

        })
</script>
@endsection
