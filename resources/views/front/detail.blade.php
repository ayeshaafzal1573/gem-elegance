@extends('front.layouts.app')
 @section('content')

<div class="container">
  <div class="row">
    <div class="col-md-5" id="main-img">
        <img src="{{ asset('/'.$product->images->first()->image_path) }}" alt="Product Image">
       </div>
     <div class="col-md-5 mt-3" >
     <h5>{{$product->name}}</h5>
     <p class="detail-text">{{$product->description}}</p>
   <p style="text-align: right;">Reviews(200)</p>
     <p><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-solid fa-star" style="color: #DDB731;"></i><i class="fa-regular fa-star" style="color: #000000;"></i> </p> 
  </div>
    <div class="col-md-2">
      <button class="addtocart"><a href="javascript:void(0);" onclick="addtoCart({{$product->id}})">Add to Cart</a></button><br>
      <button class="buynow"><a href="">Buy Now</a></button>
    </div>
  </div>
 <div class="row mb-0">
        @foreach($product->images->skip(1) as $image)
            <div class="col-md-1 p-0" id="main-two">
                <img src="{{ asset('/'.$image->image_path) }}" alt="Product Image">
            </div>
        @endforeach
 
    <div class="col-md-6 classic-div">
      <div class="svg">
   <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" viewBox="0 0 50 46" fill="none">
    <path d="M25 45C38.335 45 49 35.0734 49 23C49 10.9266 38.335 1 25 1C11.665 1 1 10.9266 1 23C1 35.0734 11.665 45 25 45Z" fill="#C5B19E" stroke="black" stroke-width="2"/>
    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="12">
     S
    </text>
</svg>
   <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" viewBox="0 0 50 46" fill="none">
    <path d="M25 45C38.335 45 49 35.0734 49 23C49 10.9266 38.335 1 25 1C11.665 1 1 10.9266 1 23C1 35.0734 11.665 45 25 45Z" fill="#C5B19E" stroke="black" stroke-width="2"/>
    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="12">
     M
    </text>
</svg>
   <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" viewBox="0 0 50 46" fill="none">
    <path d="M25 45C38.335 45 49 35.0734 49 23C49 10.9266 38.335 1 25 1C11.665 1 1 10.9266 1 23C1 35.0734 11.665 45 25 45Z" fill="#C5B19E" stroke="black" stroke-width="2"/>
    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="12">
     L
    </text>
</svg>
   <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" viewBox="0 0 50 46" fill="none">
    <path d="M25 45C38.335 45 49 35.0734 49 23C49 10.9266 38.335 1 25 1C11.665 1 1 10.9266 1 23C1 35.0734 11.665 45 25 45Z" fill="#C5B19E" stroke="black" stroke-width="2"/>
    <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="12">
     XL
    </text>
</svg>
</div>
<div class="feature">
 <h5>More Features:</h5>
      <p>Style:<span class="classic">{{$product->style}}</span></p>
      <p>Material:<span class="classic">{{$product->material}}</span></p>
</div>
     
    </div>
</div>

</div>
@endsection
