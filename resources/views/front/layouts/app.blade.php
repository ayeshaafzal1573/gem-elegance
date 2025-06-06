   @php

   $banner4 = $banners->where('id', 4)->first();

   @endphp
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Gem Elegance</title>
       @if($banner4)
       <link rel="icon" href="{{ asset($banner4->image_path) }}">
       @endif
       <link rel="stylesheet" href="{{asset('front-assets/style.css')}}">
       <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <meta name="csrf-token" content="{{csrf_token()}}">


   </head>

   <body>
       <!-- NAVBAR -->
       <header>
           <nav class="navbar navbar-expand-md">
               <div class="container-fluid">



                   @if ($banner4)
                   <img src="{{ asset($banner4->image_path) }}" alt="" class="logo">
                   @endif
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav me-auto mb-2">
                           <li class="nav-item">
                               <a class="nav-link" aria-current="page" href="{{route('front.index')}}">HOME</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{route('front.newarrival')}}">NEW ARRIVALS</a>
                           </li>
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownWomen" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   OUR COLLECTION
                               </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdownWomen">
                                   <a class="dropdown-item" href="{{route('front.men')}}">Men</a>
                                   <a class="dropdown-item" href="{{route('front.women')}}">Women</a>
                               </div>
                           </li>

                           <li class="nav-item">
                               <a class="nav-link" href="{{route('front.about')}}">ABOUT</a>
                           </li>
                       </ul>
                       <div class="icon">

                           <a class="nav-link" href="{{route('front.cart')}}"><i class="fa-solid fa-cart-shopping"></i></a>
                           <div class="dropdown">
                               <a class="nav-link" id="userDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fa-solid fa-user"></i>
                               </a>

                               <div class="dropdown-menu" id="user-dropdown" aria-labelledby="userDropdown">
                                   @if(Auth::check())
                                   <!-- User is logged in -->
                                   <a class="dropdown-item" href="{{ route('account.profile') }}">Profile</a>
                                   <a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
                                   @else
                                   <!-- User is not logged in -->
                                   <a class="dropdown-item" href="{{ route('admin.login') }}">Admin</a>
                                   <a class="dropdown-item" href="{{ route('account.register') }}">Sign Up</a>
                                   <a class="dropdown-item" href="{{ route('account.login') }}">Login</a>
                                   @endif
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
               </div>
           </nav>

       </header>
       <!-- NAVBAR END -->
       @yield('content')
       <!-- FOOTER -->
       <footer>
           <div class="container-fluid" id="footer-bg">
               <div class="container" id="footer-front">
                   <div class="row">
                       @if ($banner4)
                       <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" id="bg">
                           <img src="{{ asset($banner4->image_path) }}" alt="logo" class="logo">
                       </div>
                       @endif
                       <br>
                       <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" id="bg">
                           <p class="for"> FOR THE LOVE</p>
                           <p class="flowers">OF FLOWERS</p>
                       </div>
                       <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" id="bg">
                           <p>THANK YOU FOR CHOOSING GEM ELEGANCE FOR EXCEPTIONAL JEWELLERY</p>
                       </div>
                       <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" id="bg">
                           <p class="mail"><i class="fa-regular fa-envelope" style="color: #a58268;"></i><a href="mailto:ayeshaafzal1573@gmail.com">info@gemelegance.com</a></p>
                           <p class="mail"><i class="fa-solid fa-phone" style="color: #a58268;"></i><a href="tel:+92372284368">111-222-000</a></p>
                           <p class="mail"><i class="fa-solid fa-location-dot" style="color: #a58268;"></i><a href="tel:+92372284368">Karachi,Pakistan</a></p>
                       </div>
                   </div>
               </div>
           </div>
       </footer>
       <!-- FOOTER END-->

       <!-- script -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

       <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
       <script type="text/javascript">
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

       </script>


       <script type="text/javascript">
           //It makes an AJAX request to the server to add the product to the cart.
           function addtoCart(id) {
               []
               //Initiates an AJAX request using jQuery.
               $.ajax({
                   //Specifies the URL endpoint for the AJAX request.
                   url: '{{ route("front.addToCart") }}',
                   //: Sets the HTTP method to POST.
                   type: 'post',
                   //: Sends the product ID as data in the request.
                   data: {
                       id: id
                   },
                   //: Expects a JSON response from the server.
                   dataType: 'json'
                   , success: function(response) {
                       //: Defines a callback function that will be executed if the AJAX request is successful.
                       if (response.status == true) {
                           //Checks if response.status is true.
                           window.location.href = "{{route('front.cart')}}"
                       } else {
                           alert(response.message);
                       }
                   }
               });
           }

       </script>
       <script>
           AOS.init();

       </script>
   </body>
   </html>
