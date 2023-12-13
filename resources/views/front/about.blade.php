@extends('front.layouts.app')
@section('content')

<!-- about banner -->
<div class="container">
   <div class="new-banner" id="newwholebanner">
    <img src="{{asset('front-assets/images/about-banner.png')}}" alt="Banner">
   </div>
  </div>

  <div class="container">
    <div class="row mt-5" >
      <div class="col-md-6">
        <img src="{{asset('front-assets/images/aboutbanner2 (1).png')}}" alt="">
      </div>
      <div class="col-md-6 mt-5" id="abouty">
      <h4 class="about-heading">THE STORY BEHIND RADIANCE <br>
        <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
       <path d="M0 2H260" stroke="#A5826A" stroke-width="3"/>
     </svg>
     </h4>
     <p> who wear them. From classic and timeless designs
      Our collections are as diverse as the individuals
       to modern and trendsetting pieces, we offer a wide
      array of jewelry to cater to all tastes. With materials
      range from lustrous gold to brilliant gemstones and
      beyond, you'll find something to match your every.
      mood and moment</p>
    </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="row">
    <div class="col-md-6 mt-5">
      <h4 class="about-heading mt-5">Our Working Process<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="260" height="4" viewBox="0 0 260 4" fill="none">
       <path d="M0 2H260" stroke="#A5826A" stroke-width="3"/>
     </svg>
     </h4>
     <p> We meticulously select the finest materials to bring our designs
      to life. From high-quality metals, dazzling gemstones,
      and lustrous pearls to leather, wood, and more, we ensure
      that each material meets our rigorous standards for beauty and durabilityt</p>
    </div>
    <div class="col-md-6" id="abouto">
      <img src="{{asset('front-assets/images/Rectangle 44.png')}}" alt="" width="100%">
    </div>
  </div>
</div>





@endsection
