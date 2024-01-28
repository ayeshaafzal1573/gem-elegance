@extends('front.layouts.app')
@section('content')
  <section class=" section-11 ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                  @include('front.account.common.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="card" id="personal">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Offers</h2>
                        </div>
                        <div class="card-body p-4">
           <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Orders #</th>
                                            <th>Date Purchased</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($orders->isNotEmpty())
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{route('account.orderDetail',$order->id)}}">{{$order->id}}</a>
                                            </td>
                                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d,M,Y')}}</td>
                                            <td>
                                                @if($order->status=='Pending')
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif($order->status=='Shipped')
                                                <span class="badge bg-info">Shipped</span>
                                                @else
                                                <span class="badge bg-success">Delivered</span>

                                                @endif
                                            </td>
                                            <td>Rs: {{number_format($order->grand_total)}}</td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3">Orders not found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
