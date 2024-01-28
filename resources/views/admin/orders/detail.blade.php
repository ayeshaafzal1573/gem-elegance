@extends('admin.layouts.app')
@section('content')
<h1>Order</h1> <br>
<p>{{$order->id}}</p>
<h1>Shipping Address</h1>
<p>{{$order->first_name.''.$order->last_name}}</p>
<p>{{$order->address}} <br>
{{$order->city}},{{$order->zip}}
<br>
{{$order->mobile}}
<br>
{{$order->email}}
</p>
<p>
     @if(!empty($order->shipped_date))
   {{\Carbon\Carbon::parse($order->shipped_date)->format('d M,Y')}}

   @endif
</p>
<p>
    {{$order->countryName}}
</p>
<p>
    {{$order->id}}
</p>
<p>
    {{number_format($order->grand_total,2)}}
</p>

<p>
      @if ($order->status == 'Pending')
        <span class="cell-label bg-danger badge">Pending</span>
    @elseif ($order->status == 'Shipped')
        <span class="cell-label bg-info">Shipped</span>
    @elseif ($order->status == 'Delivered')
        <span class="cell-label bg-success">Delivered</span>
    @elseif ($order->status == 'Cancelled')
        <span class="cell-label bg-danger">Cancelled</span>
    @endif
</p>
<form action="{{ route('orders.changeOrderStatus', $order->id) }}" method="post" name="changeOrderStatusForm" id="changeOrderStatusForm">
    @csrf

<p>
    <h6>Order Status</h6>
    <select name="status" >
        <option value="Pending" {{($order->status=='Pending')?'selected':''}}>Pending</option>
        <option value="Shipped" {{($order->status=='Shipped')?'selected':''}}>Shipped</option>
        <option value="Delivered" {{($order->status=='Delivered')?'selected':''}}>Delivered</option>
        <option value="Cancelled" {{($order->status=='Cancelled')?'selected':''}}>Cancelled</option>
    </select>
    <label for="shipped_date">Shipped Date</label>
    <input type="text" name="shipped_date" id="shipped_date">
    <button>Update</button>
    </form>
</p>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    <tr>
        @foreach ($orderItems as $item)
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->qty}}</td>
        <td>{{$item->total}}</td>
        @endforeach
    </tr>
</table>

@endsection
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

            }
            })

        })
</script>
