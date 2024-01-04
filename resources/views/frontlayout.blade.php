<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Dream Luxury Hotel </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset ('css1/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset ('css1/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset ('css1/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset ('images1/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset ('css1/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{ asset ('css1/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset ('css1/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      
      <style>
         /* Custom CSS to make carousel control arrows bigger */
/* Hide the default arrow icons */
.carousel-control-prev,
.carousel-control-next {
    background: none;
    border: 1px;
    font-size: 0; /* Hide text content */
    
}

/* Display the custom arrow images */
.carousel-control-prev i,
.carousel-control-next i {
    display: inline-block; /* Show the images */
}

/* Style the custom arrow images */
.carousel-control-prev i img,
.carousel-control-next i img {
    width: 40px; /* Adjust the width as needed */
    height: 40px; /* Adjust the height as needed */
    color: #000;
}




      </style>
   
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
               <a href="{{url('/')}}"><h3 style="color: black;">Dream Luxury Hotel</h3></a>

               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#services">services</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                     </li>
                     
                     @if(Session::has('customerlogin'))
                     <li class="nav-item">
                        <a class="nav-link button btn-warning mx-2"  style="border-radius:20px" href="{{url('booking')}}">Booking</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link button btn-warning "  style="border-radius:20px" href="{{url('bookinglist')}}">Booking List</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="search_icon">
                        <ul>
                        
                        <li><a href="{{url('logout')}}">LOGOUT</a></li>
                           
                          @else
                          <form class="form-inline my-2 my-lg-0">
                     <div class="search_icon">
                        <ul>
                          <li><a href="{{url('frontlogin')}}">LOGIN</a></li>
                           
                           <li><a href="{{url('register')}}">REGISTER</a></li>
                          @endif
                          
                           
                        </ul>
                     </div>
                  </form>
               </div>
            </nav>
         </div>

         
      
         @yield('content')
     
         
      </div>
    <!--  footer section end -->
      <!-- copyright section start -->
      
      <div class="copyright_section">
      <div class="container ">
         <p class="copyright_text">2023 All Rights Reserved. Design by DreamCatcher </p>
      </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      
      <link href="{{ asset('public/vendor/lightbox2-2.11.4/dist/css/lightbox.min.css') }}" rel="stylesheet">
      <script src="{{ asset('public/vendor/lightbox2-2.11.4/dist/js/lightbox.min.js') }}"> </script>
<script>
    // Initialize Lightbox
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>



      <script src="{{ asset ('js1/jquery.min.js')}}"></script>
      <script src="{{ asset ('js1/popper.min.js') }}"></script>
      <script src="{{ asset ('js1/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset ('js1/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset ('js1/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset ('js1/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset ('js1/custom.js') }}"></script>
      <!-- javascript --> 
      <script src="{{ asset ('js1/owl.carousel.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      @yield('scripts')   
   </body>
</html>