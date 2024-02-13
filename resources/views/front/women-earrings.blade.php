@extends('front.layouts.app')
@section('content')

<!-- CATEGORIES -->
<h3 class="women-heading">
    POPULAR EARRINGS <br />
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="260"
        height="4"
        viewBox="0 0 260 4"
        fill="none"
    >
        <path d="M0 2H260" stroke="#A5826A" stroke-width="3" />
    </svg>
</h3>

<div class="container">
    <div class="row justify-content-center">
    @if($filteredProducts->isNotEmpty())
        @foreach ($filteredProducts as $product)
            <div class="col-sm-4 col-md-5 col-lg-4 col-xl-4 rings">
                @if($product->images->isNotEmpty())
                    <img src="{{ asset('/' . $product->images->first()->image_path) }}" alt="product" class="img-fluid" width="100%">
                @else
                    <p>No Image</p>
                @endif
                <div class="rings-text"><a href="{{ route('front.product-detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a></div>
            </div>
        @endforeach
    @else
        <div class="col-md-12">
            <p>No products available.</p>
        </div>
          </div>
    @endif


</div>

@endsection
