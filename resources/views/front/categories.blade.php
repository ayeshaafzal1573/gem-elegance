@extends('front.layouts.app')

@section('content')

    @if(isset($maleData))
       <div class="women-banner-img">
      <img src="{{asset('front-assets/images/man-banner.png')}}" alt="Banner" />
    </div>
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
                @foreach ($maleData as $category)
                    <div class="col-md-4 earing">
                        <a href="{{ route('front.' . $category->slug) }}">
                            @if($category->image)
                                <img src="{{ asset('storage/uploads/category/' . $category->id . '.png') }}"
                                     alt="{{ $category->name }}" />
                                {{ $category->name }}
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(isset($femaleData))
    <div class="women-banner-img">
        <img src="{{ asset('front-assets/images/WOMEN-BANNER.png') }}" alt="Banner" />
    </div>
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
                @foreach ($femaleData as $cat)
                    <div class="col-md-4 earing">
                      {{-- <a href="{{ route('front.women-products', ['type' => $cat->type]) }}"> --}}

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
