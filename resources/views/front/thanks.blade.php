@extends('front.layouts.app')
@section('content')
@php

    $banner8 = $banners->where('id', 8)->first();
@endphp


 <div class="col-md-12">
    @if ($banner8)
        <img src="{{ asset($banner8->image_path) }}" alt="" class="img-fluid">
        @endif
      </div>
@endsection
