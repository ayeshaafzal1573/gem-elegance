@extends('front.layouts.app')

@section('content')
@php

    $banner5 = $banners->where('id', 5)->first();
@endphp



    <!-- new-arrivals -->
   <div class="container-fluid" id="firstsection" >
    <div class="row">
        <div class="col md-12" >
            <p> We Are Currently Offering a 20% Discount Across The Website  Using The Code</p>
        </div>
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-4">
               <p class="together">TOGETHER20</p>
          </div>
          <div class="col-md-4"></div>
        </div>
    </div>

   </div>
    @if ($banner5)
   <div class="new-banner" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
    <img src="{{ asset($banner5->image_path) }}" alt="Banner">
 </div>
@endif
   <h3 class="women-heading">NEW ARRIVALS<br>
    <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
   <path d="M0 2H260" stroke="#A5826A" stroke-width="3"/>
 </svg>
 </h3>

 <div class="container">
  <div class="row mt-3 mb-4" >
    <div class="col-md-1">
    </div>
     @if($latestWomenProduct)
   <div class="col-md-2" id="newestproducts" data-aos="zoom-in-up">
         <div style="position: relative; ">
               @if($latestWomenProduct->images->isNotEmpty())

                            <img src="{{ asset('/' . $latestWomenProduct->images->first()->image_path) }}" alt="Gem"  >
                        @else
                            <p>No Image</p>
                        @endif

        <button class="newestbutton1" data-aos="zoom-out">
              <a href="{{ route('front.product-detail', $latestWomenProduct->slug) }}">VIEW MORE</a>

        </button>
    </div>
    <p class="newesttext">{{ $latestWomenProduct->name }}</p>
    <p class="newesttext">Rs: {{ $latestWomenProduct->price }}</p>
</div>
 @endif
<div class="col-md-2">
</div>
 @if($latestMenProduct)
<div class="col-md-3" id="newestproducts" data-aos="zoom-in-up">
    <div style="position: relative;">

        <img src="{{ asset('/' . $latestMenProduct->images->first()->image_path) }}" alt="">
        <button class="newestbutton2" data-aos="zoom-out">
             <a href="{{ route('front.product-detail', $latestMenProduct->slug) }}">VIEW MORE</a>
        </button>
    </div>
    <p class="newesttext">{{ $latestMenProduct->name }}</p>
    <p class="newesttext">{{ $latestMenProduct->price }}</p>
</div>
@endif
  </div>
</div>

@endsection
