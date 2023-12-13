@extends('front.layouts.app')
@section('content')
<style>
    body {
        background: white !important;

    }
</style>
   <!--HOME BANNER -->

   <div class="banner-img">
  <img src="{{asset('front-assets/images/home-banner.png')}}" alt="Banner">
  <button class="button"><a href="">Explore Collection</a></button>
</div>

 <div class="banner-img">
    <img src="{{asset('front-assets/images/home-banner-2.png')}}" alt="Banner">
  <button class="button-two"><a href=""> Read More</a></button>
   </div>
 <div class="banner-img-last">
    <img src="{{asset('front-assets/images/last-banner.png')}}" alt="Banner">
   </div>
   <!--HOME BANNER END-->
   @endsection

