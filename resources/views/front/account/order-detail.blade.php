@extends('front.layouts.app')
@section('content')
  <section class=" section-11 ">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                  @include('front.account.common.sidebar')
                </div>
                  <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                        </div>

                        <div class="card-body pb-0">
                            <!-- Info -->
                            <div class="card card-sm">
                                <div class="card-body mb-3">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Order No:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 fs-sm fw-bold">
                                            {{$order->id}}
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Shipped date:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 fs-sm fw-bold">
                                                <time datetime="2019-10-01">
                                                    01 Oct, 2019
                                                </time>
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Status:</h6>
                                            <!-- Text -->
                                            <p class="mb-0 fs-sm fw-bold">
                                              @if($order->status=='Pending')
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif($order->status=='Shipped')
                                                <span class="badge bg-info">Shipped</span>
                                                @else
                                                <span class="badge bg-success">Delivered</span>

                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <!-- Heading -->
                                            <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                            <!-- Text -->
                                            <p class="mb-0 fs-sm fw-bold">
                                            Rs: {{number_format($order->grand_total,2)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-3">

                            <!-- Heading -->
                            <h6 class="mb-7 h5 mt-4">Order Items</h6>

                            <!-- Divider -->
                            <hr class="my-3">

                            <!-- List group -->
                            <ul>
                                @foreach ($orderItems as $item)


                                <li class="list-group-item">
                                    <div class="row align-items-center">

                                        <div class="col">
                                            <!-- Title -->
                                            <p class="mb-4 fs-sm fw-bold" style="font-family: Arial, Helvetica, sans-serif;">
                                               {{$item->name}} x {{$item->qty}} <br>
                                                <span class="text-muted" style="font-family: Arial, Helvetica, sans-serif;">Rs: {{$item->total}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                 @endforeach


                            </ul>
                        </div>
                    </div>

                    <div class="card card-lg mb-5 mt-3">
                        <div class="card-body">
                            <!-- Heading -->
                            <h6 class="mt-0 mb-3 h5">Order Total</h6>

                            <!-- List group -->
                            <ul>
                                <li class="list-group-item d-flex">
                                    <span>Subtotal</span>
                                    <span class="ms-auto">Rs: {{number_format($order->subtotal,2)}}</span>
                                </li>
                                <li class="list-group-item d-flex">
                                    <span>Discount</span>
                              <span class="ms-auto"> {{ (!empty($order->discount)) ? $order->discount : '' }}</span>
  </li>
                                <li class="list-group-item d-flex">
                                    <span>Shipping</span>
                                    <span class="ms-auto">Rs: {{number_format($order->shipping,2)}}</span>
                                </li>
                                <li class="list-group-item d-flex fs-lg fw-bold">
                                    <span>Total</span>
                                    <span class="ms-auto">Rs: {{number_format($order->grand_total,2)}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
