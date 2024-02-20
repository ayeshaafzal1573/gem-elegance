@extends('front.layouts.app')
@section('content')
<style>
    body {
        background: white !important;

    }
</style>
@php

    $banner1 = $banners->where('id', 1)->first();
    $banner4 = $banners->where('id', 5)->first();
    $banner5 = $banners->where('id', 6)->first();
    $banner2 = $banners->where('id', 2)->first();
    $banner3 = $banners->where('id', 3)->first();
@endphp
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @if ($banner1)
    <div class="carousel-item active" data-bs-interval="1000">
      <img src="{{ asset($banner1->image_path) }}" class="d-block w-100" alt="...">
    </div>
     @endif
       @if ($banner4)
    <div class="carousel-item" data-bs-interval="2000">
      <img src="{{ asset($banner4->image_path) }}" class="d-block w-100" alt="...">
    </div>
    @endif
    @if($banner5)
        <div class="carousel-item">
      <img src="{{ asset($banner5->image_path) }}" class="d-block w-100" alt="...">
    </div>
    @endif
    
  </div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" hidden>
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" hidden>
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@if ($banner2)
    <div class="banner-img" >
        <img src="{{ asset($banner2->image_path) }}" alt="Banner 2">
        <button class="button-two"><a href="#">Read More</a></button>
    </div>
@endif
@if ($banner3)
     <div class="banner-img-last" >
    <img src="{{ asset($banner3->image_path) }}" alt="Banner">
   </div>
@endif

   @endsection

