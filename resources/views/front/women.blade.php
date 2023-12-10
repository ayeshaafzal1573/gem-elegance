@extends('front.layouts.app')
@section('content')
    <!--HOME BANNER -->
    <div class="women-banner-img">
        <img src="{{ asset('front-assets/images/WOMEN-BANNER.png') }}" alt="Banner" />
    </div>
    <!--HOME BANNER END-->
    <!-- CATEGORIES -->
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
    @if ($category->isNotEmpty())
        <div class="container mb-5">
            <div class="row">
                @foreach ($category as $cat)
                    <div class="col-md-4 earing">
                        <a href="{{ route('front.' . $cat->slug) }}">
                            @if ($cat->image)
                                <img src="{{ asset('storage/uploads/category/' . $cat->id . '.png') }}"
                                     alt="{{ $cat->name }}" />
                                {{ $cat->name }}
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
