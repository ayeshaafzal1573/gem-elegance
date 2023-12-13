@extends('front.layouts.app')
@section('content')

<h3 class="women-heading">
    MY CART <br />
    <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
        <path d="M0 2H260" stroke="#A5826A" stroke-width="3" />
    </svg>
</h3>
@if ($cartContent->isNotEmpty())
<div class="container mb-5" id="gem-cart">

    <div class="row">
        <div class="col-md-8">
            <div class="card container-fluid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="cart-container">
                            @foreach ($cartContent as $item)
                            <div class="items product row cart-item">
                                <div class="col-md-2 mt-1">
                                    @if ($item->options->has('images'))
                                    @if (is_string($item->options['images']))
                                    <img class="img-fluid mx-auto d-block image" src="{{ $item->options['images'] }}"
                                        alt="Product Image" id="cart-image">
                                    @else
                                    @if ($item->options['images']->isNotEmpty())
                                    <img class="img-fluid mx-auto d-block image"
                                        src="{{ asset('/' . $item->options['images']->first()->image_path) }}"
                                        alt="Product Image">
                                    @else
                                    <span>No image available</span>
                                    @endif
                                    @endif
                                    @else
                                    <span>No image available</span>
                                    @endif
                                </div>
                                <div class="col-md-8" id="prices">
                                    <h5>{{ $item->name }}</h5>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <h6>Rs: <span>{{ $item->price }}</span></h6>
                                        </div>
                                        <div class="col-md-4 quantity">

                                            <div class="quantity-container">
                                                <button class="btn-minus sub" data-id="{{ $item->rowId }}">-</button>

                                               <input class="form-control quantity-input" type="number" value="{{ $item->qty }}" data-initial-quantity="{{ $item->qty }}">

                                                <button class="btn-plus add" data-id="{{ $item->rowId }}">+</button>
                                            </div>
                                        </div>

                                        <div class="col-md-4 price">
                                            <span class="item-total">Rs:{{ $item->price * $item->qty }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3 right-4">
                                           <button class="delete-button" data-id="{{ $item->rowId }}">
    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
<div class="card cart-summary" id="gem-sum">
    <div class="card-body">
        <h4 class="text-center mb-4">Order Summary</h4>
        @if ($cartContent->isNotEmpty())
            <div class="d-flex justify-content-between summary-end">
                <div class="p"><strong>Subtotal:</strong></div>
                <span class="price" id="subtotalValue">{{ Cart::subtotal() }}</span>
            </div>
            <div class="d-flex justify-content-between mt-2 summary-end">
                <div class="h5"><strong>Total:</strong></div>
                <span class="price" id="totalPrice">{{ Cart::subtotal() }}</span>
            </div>
        @endif
    </div>
</div>


               <button type="button" class="btn btn-primary  btn-block" id="btn-checkout"><a href="{{route('front.checkout')}}">Checkout</a></button>'

            </div>
        </div>
    </div>
</div>
@else
<p>Your cart is empty</p>
@endif
@endsection

<!-- Move the script below your HTML content -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
    $('.quantity-container').on('click', '.add', function () {
        handleQuantityChange($(this), 1);
    });

    $('.quantity-container').on('click', '.sub', function () {
        handleQuantityChange($(this), -1);
    });

    function handleQuantityChange(button, change) {
        var qtyElement = button.siblings('.quantity-input');
        var rowId = button.data('id');
        var currentQty = parseInt(qtyElement.val(), 10);
        var initialQty = parseInt(qtyElement.data('initial-quantity'), 10);

        if (isNaN(currentQty) || isNaN(initialQty)) {
            console.error('Invalid quantity values detected');
            return;
        }

        var newVal = currentQty + change;

        // Check if the new value is within valid bounds
        if (newVal >= 1 && newVal <= 999) {
            updateCartWithPromise(rowId, newVal).then(function () {
                qtyElement.val(newVal);
                updateItemTotalPrice(qtyElement.closest('.product'));
                updateTotalPrice();
            });
        }
    }


function updateCartWithPromise(rowId, qty) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '{{ route('front.updateCart') }}',
            type: 'post',
            data: { rowId: rowId, qty: qty },
            dataType: 'json',
            success: function (response) {
                if (response.status == true) {
                    resolve(response.newVal);
                } else {
                    reject('Update failed');
                }
            },
            error: function (xhr, status, error) {
                reject(error);
            }
        });
    });
}
function updateItemTotalPrice(itemContainer) {
    var qty = parseInt(itemContainer.find('.quantity-input').val(), 10);
    var priceTextContainer = itemContainer.find('.price h6 span');
    var trimmedPriceText = priceTextContainer.text().trim();
    if (!trimmedPriceText) {
        console.error('Empty price text');
        return;
    }
    var priceMatch = trimmedPriceText.match(/[\d,.]+(\.\d+)?/);
    if (!priceMatch || priceMatch.length === 0) {
        console.error('Invalid price format or no matched values');
        return;
    }
    console.log('Matched Values:', priceMatch);
    var pricePerItem = parseFloat(priceMatch[0]);
    if (isNaN(qty) || isNaN(pricePerItem)) {
        console.error('Invalid numeric values detected');
        return;
    }

    var itemTotal = qty * pricePerItem;
    itemContainer.find('.item-total').text('Rs:' + itemTotal.toFixed(2));
}



     function updateTotalPrice() {
    var total = 0;
    var subtotal = 0;  // Add this line for subtotal

    $('.product').each(function () {
        var qty = parseInt($(this).find('.quantity-input').val());
        var pricePerItem = parseFloat($(this).find('.price span').text().replace('Rs:', ''));

        // Check if values are valid numbers
        if (isNaN(qty) || isNaN(pricePerItem)) {
            console.error('Invalid numeric values detected');
            return;
        }

        var itemTotal = qty * pricePerItem;
        total += itemTotal;
        subtotal += itemTotal;  // Add this line for subtotal
    });

    // Update the total and subtotal prices in the summary section
    $('#subtotalValue').text('Rs:' + subtotal.toFixed(2));
    $('#totalPrice').text('Rs:' + total.toFixed(2)); // Round to 2 decimal places
}

    });
</script>
<script>
    $(document).ready(function () {
        $('.delete-button').on('click', function () {
            var rowId = $(this).data('id');
            deleteItem(rowId);
        });

        function deleteItem(rowId) {
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: '{{ route("front.deleteItem", [":rowId"]) }}'.replace(':rowId', rowId),
                    type: 'post', // Change the type to 'post'
                    data: {
                        _method: 'delete',
                        _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == true) {
                            // Handle success if needed
                            // Reload or update the cart content
                            location.reload();
                        } else {
                            alert(response.message); // Show an alert for unsuccessful deletion
                        }
                    },
                    error: function (xhr, status, error) {
                        alert(error); // Show the error message
                    }
                });
            }
        }
    });
</script>
