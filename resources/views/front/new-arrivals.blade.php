@extends('front.layouts.app')

@section('content')

    <!-- new-arrivals -->
   <div class="container-fluid" id="firstsection">
    <div class="row">
        <div class="col md-12">
            <p> We Are Currently Offering a 20% Discount Across The Website  Using The Code</p>
        </div>
        <div class="row">
          <div class="col-md-5"></div>
          <div class="col-md-4">           <p class="together">TOGETHER20</p>
          </div>
          <div class="col-md-4"></div>
        </div>
    </div>

   </div>

   <!-- new arrival banner -->
   <div class="new-banner">
    <img src="{{asset('front-assets/images/new-arrival-banner.png')}}" alt="Banner">
    <button class="shopnow"><a href="">SHOP NOW </a></button>
   </div>

   <!-- products -->
   <h3 class="women-heading">NEWEST PRODUCTS<br>
    <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
   <path d="M0 2H260" stroke="#A5826A" stroke-width="3"/>
 </svg>
 </h3>

 <div class="container">
  <div class="row mt-3 mb-4" >
    <div class="col-md-1">
    </div>
   <div class="col-md-2" id="newestproducts">
    <div style="position: relative;">
        <img src="{{asset('front-assets/images/Rectangle 21.png')}}" alt="">
        <button class="newestbutton1">
            <a href="{{route('front.women-necklace')}}">VIEW MORE</a>
        </button>
    </div>
    <p class="newesttext">Gold Plated Necklace</p>
    <p class="newesttext">Rs: 1000.00</p>
</div>

<div class="col-md-2">
</div>

<div class="col-md-3" id="newestproducts">
    <div style="position: relative;">
        <img src="{{asset('front-assets/images/Rectangle 23.png')}}" alt="">
        <button class="newestbutton2">
            <a href="{{route('front.men-necklace')}}">VIEW MORE</a>
        </button>
    </div>
    <p class="newesttext">Silver Necklace</p>
    <p class="newesttext">Rs: 2000.00</p>
</div>

  </div>
</div>

@endsection
