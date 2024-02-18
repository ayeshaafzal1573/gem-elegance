@extends('front.layouts.app')
@section('content')
<style>
    body {
        background: white !important;

    }
</style>
@php

    $banner1 = $banners->where('id', 1)->first();
    $banner2 = $banners->where('id', 2)->first();
    $banner3 = $banners->where('id', 3)->first();
@endphp
@if ($banner1)
    <div class="banner-img">
        <img src="{{ asset($banner1->image_path) }}" alt="Banner 1">
        <button class="button"><a href="#">Explore Collection</a></button>
    </div>
@endif

@if ($banner2)
    <div class="banner-img">
        <img src="{{ asset($banner2->image_path) }}" alt="Banner 2">
        <button class="button-two"><a href="#">Read More</a></button>
    </div>
@endif
@if ($banner3)
     <div class="banner-img-last">
    <img src="{{ asset($banner3->image_path) }}" alt="Banner">
   </div>
@endif

   @endsection

