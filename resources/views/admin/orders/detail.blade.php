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

@endsection
