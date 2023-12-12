@extends('front.layouts.app')
 @section('content')

<div class="container">
  <div class="row">
    <div class="col-md-5" id="main-img">
        <img src="{{ asset('/'.$product->images->first()->image_path) }}" alt="Product Image">
        <div class="row">
 @foreach($product->images->skip(1) as $image)
            <div class="col-md-3" id="main-two">
                <img src="{{ asset('/'.$image->image_path) }}" alt="Product Image">
            </div>
        @endforeach
        </div>
       </div>
     <div class="col-md-6 " id="p-des" >
     <h5>{{$product->name}}</h5>
     <p class="detail-text">{{$product->description}}</p>
   <p>{{$product->price}}
   <span style="text-align: right ">{{$product->compare_price}}</span></p>
     <p><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-regular fa-star" style="color: #000000;"></i> </p>

<div class="feature">
 <h5>More Features:</h5>
      <p>Style:<span class="classic">{{$product->style}}</span></p>
      <p>Material:<span class="classic">{{$product->material}}</span></p>
</div>

    </div>
        <div class="col">
        <button class="addtocart"><a href="javascript:void(0);" onclick="addtoCart({{$product->id}})">Add to Cart</a></button><br>
        <button class="buynow"><a href="">Buy Now</a></button>
        </div>
  </div>
    </div>


@endsection
