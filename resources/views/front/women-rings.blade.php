@extends('front.layouts.app')
@section('content')

    <h3 class="women-heading">
      POPULAR RINGS <br />
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

   @php
    $filteredProducts = $products->filter(function ($product) {
        return $product->category_id === 4;
    });
@endphp
@if($filteredProducts->isNotEmpty())
    @foreach ($filteredProducts as $product)
        <div class="col-md-4 rings">
                    @if($product->images->isNotEmpty())
                        <img src="{{ asset('/' . $product->images->first()->image_path) }}" alt="product" class="img-fluid">
                    @else
                        <p>No Image</p>
                    @endif
                   <div class="rings-text"><a href="{{ route('front.product-detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a></div>

                </div>

    @endforeach
</div>
     </div>
@else
    <p>No products available.</p>
@endif

@endsection
