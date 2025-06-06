@extends('front.layouts.app')
@section('content')
<main>
    <section class="section-5">
        <div class="container">
            <h3 class="women-heading">
     CHECKOUT <br />
      <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
        <path d="M0 2H260" stroke="#A5826A" stroke-width="3" />
      </svg>
    </h3>
        </div>
    </section>

    <section class="section-9 pt-4" data-aos="flip-right">
        <div class="container">
            <form action="{{route('front.processCheckout')}}" name="orderForm" id="orderForm" method="post">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body checkout-form">
                              <div class="sub-title text-center mb-2">
                        <h4>Shipping Address</h2>
                    </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" >
                                    @error('first_name')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" >
                                          @error('last_name')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" >
                                          @error('email')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select a Country</option>
                                            @if($countries->isNotEmpty())
                                            @foreach ($countries as $country )
<option {{ !empty($customerAddress) && $customerAddress->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
     @endforeach

                                            @endif
                                        </select>
                                        @error('country')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Address" class="form-control" ></textarea>
                                      @error('address')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="apartment" id="appartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" >
                                      @error('apartment')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="City" >
                                          @error('city')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="state" id="state" class="form-control" placeholder="State" >
                                      @error('state')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip" >
                                      @error('zip')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No." >
                                     @error('mobile')
                                        <span class="text-danger">
									{{$message}}
								</span>
                                    @enderror
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-5" data-aos="zoom-in">
                    <div class="sub-title">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="card cart-summary">
                        <div class="card-body">
                            @foreach (Cart::content() as $item )
 <div class="d-flex  pb-2">
    <div class="checkout-image">
     @if ($item->options->has('images'))
                                        @if (is_string($item->options['images']))
                                            <!-- Handle the case where 'images' is a string (e.g., the image URL) -->
                                            <img class="img-fluid mx-auto d-block image" src="{{ $item->options['images'] }}" alt="Product Image" id="cart-image" >
                                        @else
                                            <!-- Handle the case where 'images' is an object (e.g., Eloquent collection) -->
                                            @if ($item->options['images']->isNotEmpty())
                                                <img class="img-fluid image" src="{{ asset('/' . $item->options['images']->first()->image_path) }}" alt="Product Image">
                                            @else
                                                <span>No image available</span>
                                            @endif
                                        @endif
                                    @else
                                        <span>No image available</span>

                                        @endif
         </div>
                                        <div class="h6" >{{$item->name}} x {{$item->qty}}</div>

                            </div>

                            @endforeach
<hr>
                            <div class="d-flex justify-content-between summary-end">
                                <div class="h6"><strong>Price:</strong></div>
                                <div class="p">Rs: {{$item->price*$item->qty}}</div>
                            </div>
                            <div class="d-flex justify-content-between summary-end mt-1">
                                <div class="h6"><strong>Subtotal:</strong></div>
                                <div class="p">Rs: {{Cart::subtotal()}}</div>
                            </div>
                              <div class="d-flex justify-content-between mt-2">
                                <div class="h6"><strong>Discount:</strong></div>
                                <div class="h6"id="discount_value">Rs:{{number_format($discount)}}</div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="h6"><strong>Shipping:</strong></div>
                                <div class="h6"id="shippingAmount">Rs:{{number_format($totalShippingCharge,2)}}</div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 summery-end">
                                <div class="h5"><strong>Total:</strong></div>
                                <div class="h5" id="grandTotal">Rs: {{number_format($grandtotal)}}</div>
                            </div>
                        </div>
                    </div>
 <div class="input-group apply-coupan mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control" name="discount_code" id="discount_code">
                        <button class="btn btn-dark" type="button" id="apply-discount">Apply Coupon</button>

                    </div>
                    <div class="card-payment-form mt-2 ">
   <h3 class="card-title h5 mb-3">Payment Method</h3>

                        <div >
                            <input type="radio"  checked id="payment_method_one" name="payment_method" value="cod">
                            <label for="payment_method_one" class="form-check-label">COD</label>
                        </div>
                        <div>
                            <input type="radio" id="payment_method_two" name="payment_method" value="cod">
                            <label for="payment_method_two" class="form-check-label">Stripe</label>
                        </div>
                        <div class="card-body p-0 d-none" id="card-payment-form">
                            <div class="mb-3">
                                <label for="card_number" class="mb-2">Card Number</label>
                                <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">Expiry Date</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">CVV Code</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="123" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
    <button type="submit" class="btn" id="btn-pay">Pay Now</button>

                </div>
            </div>
                </form>
        </div>
    </section>
</main>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
 $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#payment_method_one").click(function() {
        if ($(this).is(":checked")) {
            $("#card-payment-form").addClass('d-none');
        }
    });

    $("#payment_method_two").click(function() {
        if ($(this).is(":checked")) {
            $("#card-payment-form").removeClass('d-none');
        }
    });

    $("#orderForm").submit(function(event) {
        event.preventDefault();
        $('button[type="submit"]').prop('disabled', true)

        $.ajax({
            url: '{{ route('front.processCheckout') }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                $('button[type="submit"]').prop('disabled', false)

                if (response.status == false) {
               alert("Try Again")
                } else {

                    window.location.href = "{{ route('front.thanks', ['OrderId' => ':OrderId']) }}".replace(':OrderId', response.orderId);
                }
            },
            error: function(xhr, status, error) {

            }
        });
    });

    $("#country").change(function () {
        console.log("Country changed");
        $.ajax({
            url: '{{ route('front.ordersummary') }}',
            type: 'post',
            data: { country_id: $(this).val() },
            dataType: 'json',
            success: function (response) {
                console.log("AJAX success", response);
                if (response.status) {
                    $('#shippingAmount').html('Rs: ' + response.shippingCharge);
                    $('#grandTotal').html('Rs: ' + response.grandtotal);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error", status, error);

            }
        });
    });

   // Apply Discount Click Event
$("#apply-discount").click(function () {
    $.ajax({
        url: '{{ route('front.applyDiscount') }}',
        type: 'post',
        data: { code: $("#discount_code").val(), country_id: $("#country").val() },
        dataType: 'json',
      success: function (response) {
    console.log("AJAX success", response);
    if (response.status) {
        $('#shippingAmount').html('Rs: ' + response.shippingCharge);
        $('#grandTotal').html('Rs: ' + response.grandtotal);
        $('#discount_value').html('Rs: ' + response.discount); // Update this line
    } else {
        // Check if the message is 'Invalid discount coupon'
        if (response.message === 'Invalid discount coupon') {
            alert('Invalid discount coupon');
        }
    }
},

        error: function (xhr, status, error) {
            console.error("AJAX error", status, error);

        }

    });
});


    });



</script>
