@extends('front.layouts.app')

@section('content')
<div class="container mb-3" data-aos="zoom-in">
    <div class="row">
        <div class="col-md-5" id="main-img">
            <img src="{{ asset('/'.$product->images->first()->image_path) }}" alt="Product Image" id="main-image">
        </div>
        <div class="col-md-2 main-two-container">
            @foreach($product->images->skip(1) as $image)
                <div class="col-md-1" id="main-two">
                    <img src="{{ asset('/'.$image->image_path) }}" alt="Product Image" class="thumbnail-image" data-src="{{ asset('/'.$image->image_path) }}">
                </div>
            @endforeach
        </div>
        <div class="col-md-5 mt-3 " id="p-des"  data-aos="zoom-out">
            <h5>{{$product->name}}</h5>
            <p class="detail-text">{{$product->description}}</p>
            <p>{{$product->price}}
                <span class="compare"><del>{{$product->compare_price}}</del></span>
            </p>
            <p class="star"><i class="fa-solid fa-star" ></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star" ></i><i class="fa-regular fa-star" style="color: #000000;"></i> </p>
            <div class="feature">
                <h5>More Features:</h5>
                <p>Style: <span class="classic">{{$product->style}}</span><span class="material">Material: </span><span class="classic">{{$product->material}}</span></p>
                <button class="addtocart"><a href="javascript:void(0);" onclick="addtoCart({{$product->id}})">Buy Now</a></button><br>
            </div>
        </div>
    </div>
</div>
<script>
    // Add click event listener to each thumbnail image
    document.querySelectorAll('.thumbnail-image').forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {
            // Get the source of the clicked thumbnail image
            var newSrc = this.getAttribute('data-src');
            // Change the source of the main image
            document.getElementById('main-image').src = newSrc;
        });
    });
</script>

@endsection
