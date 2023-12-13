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

 <div class="container-fluid">
  <div class="row mt-3" >
    <div class="col-md-1">
    </div>
    <div class="col-md-3" id="newestproducts">
      <div> <img src="{{asset('front-assets/images/Rectangle 21.png')}}" alt="">
        <button class="newestbutton1"><a href="">VIEW MORE</a></button>
      </div>

      <p class="newesttext">Gold Plated neck piece</p>
      <p class="newesttext">$100</p>
    </div>

    <div class="col-md-3">
    </div>
    <div class="col-md-3" id="newestproducts">
      <div> <img src="{{asset('front-assets/images/Rectangle 23.png')}}" alt="">
        <button class="newestbutton2"><a href="">VIEW MORE </a></button>
      </div>

      <p class="newesttext">Gold Plated neck piece</p>
      <p class="newesttext">$100</p>
    </div>

  </div>
</div>

@endsection
