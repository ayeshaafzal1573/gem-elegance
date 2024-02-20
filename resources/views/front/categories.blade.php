@extends('front.layouts.app')

@section('content')
@php

    $banner6 = $banners->where('id', 6)->first();
    $banner7 = $banners->where('id', 7)->first();
@endphp

    @if(isset($maleData))
    @if ($banner6)
        <div class="women-banner-img" data-aos="flip-right">
            <img src="{{ asset($banner6->image_path) }}" alt="Banner" />
        </div>
        @endif
        <h3 class="women-heading" >
            POPULAR CATEGORIES <br />
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
        <div class="container mb-5">
            <div class="row">
                @foreach ($maleData as $male)
                    <div class="col-md-4 earing"data-aos="flip-left">
                       <a href="{{ route('front.products', ['categorySlug' => $male->slug]) }}">

                            @if($male->image)
                                <img src="{{ asset('storage/uploads/category/' . $male->id . '.png') }}"
                                     alt="{{ $male->name }}" />
                            @endif
                            {{ $male->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(isset($femaleData))
     @if ($banner7)
        <div class="women-banner-img" data-aos="flip-right">
            <img src="{{ asset($banner7->image_path) }}" alt="Banner" />
        </div>
        @endif
        <h3 class="women-heading">
            POPULAR CATEGORIES <br />
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
        <div class="container mb-5">
            <div class="row">
                @foreach ($femaleData as $category)
                    <div class="col-md-4 earing" data-aos="flip-left">
                        <a href="{{ route('front.products', ['categorySlug' => $category->slug]) }}">
                            @if ($category->image)
                                <img src="{{ asset('storage/uploads/category/' . $category->id . '.png') }}"
                                     alt="{{ $category->name }}" />
                            @endif
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
