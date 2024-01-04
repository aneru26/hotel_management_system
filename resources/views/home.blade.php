@extends('frontlayout')
@section('content')
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border border-5">
               <a href="{{url('/')}}"><h3>Dream Luxury Hotel</h3></a>  
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
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
      <!-- banner section start -->
      <div id="home" class="banner_section layout_padding my-5">
         <div class="container">
            <div id="costum_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <h3 class="furniture_text">"Meetings & Events"</h3>
                     <p class="there_text">Our venue spaces and packages are versatile and can be customized to cater to every milestone in your life, whether it’s a convention, conference, or corporate event.</p>
      
                     <div class="contact_bt_main">
                        <div class="contact_bt"><a href="#contact">Contact Us</a></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h3 class="furniture_text">"Weddings"</h3>
                     <p class="there_text">Dream Luxury Hotel understands the importance of making your most awaited day as special as possible, and you can trust us to make sure that your picture-perfect wedding dreams become a reality. Choose from any of our premium packages, each package crafted meticulously to suit varying tastes and requirements. </p>
                     <div class="contact_bt_main">
                        <div class="contact_bt"><a href="#contact">Contact Us</a></div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h3 class="furniture_text">"Special Occasions"</h3>
                     <p class="there_text">We understand the stress that comes with planning an important event. Booking with us will ensure you have one less worry to contend with. Dream Luxury Hotel state-of-the-art facilities, unique spaces, and impeccable service will transform your vision into reality. </p>
                     <div class="contact_bt_main">
                        <div class="contact_bt"><a href="#contact">Contact Us</a></div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#costum_slider" role="button" data-slide="prev">
                  <i class=""><img src="{{ asset ('images1/left-arrow.png')}}"></i>
               </a>
               <a class="carousel-control-next" href="#costum_slider" role="button" data-slide="next">
                  <i class=""><img src="{{ asset ('images1/right-arrow.png') }}"></i>
               </a>
            </div>
         </div>
      </div>
      
      <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      <div id="services" class="services_section layout_padding ">
    <div class="container mt-5">
        <h1 class="services_taital font-weight-bold bg-warning">our services</h1>
        <p class="many_taital">This is the Services we offer</p>
        <div id="services_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                $servicesCount = count($services); // Count of all services
                $servicesPerSlide = 4; // Number of services per carousel item
                $slideCount = ceil($servicesCount / $servicesPerSlide); // Calculate the number of carousel items
                $currentService = 0; // Initialize the service index
                @endphp

                @for ($i = 0; $i < $slideCount; $i++)
                <div class="carousel-item @if($i === 0) active @endif">
                    <div class="services_section2 layout_padding">
                        <div class="row">
                            @for ($j = 0; $j < $servicesPerSlide; $j++)
                            @if ($currentService < $servicesCount)
                            <div class="col-lg-3 col-sm-6">
                                <div class="icon_1"><img class="img-fluid" width="100%"
                                        src="{{ Storage::url($services[$currentService]->photo) }}"
                                        style="height: 200px"></div>
                                <h2 class="furnitures_text text-light bg-dark font-weight-bold">{{$services[$currentService]->title}}</h2>
                                <p class="dummy_text font-weight-bold">{{$services[$currentService]->small_desc}}</p>
                                <div class="read_bt_main">
                                    <div class="read_bt"><a href="#">Read More</a></div>
                                </div>
                            </div>
                            @php
                            $currentService++; // Move to the next service
                            @endphp
                            @endif
                            @endfor
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#services_slider" role="button" data-slide="prev">
    <i><img src="{{ asset('images1/left-arrow.png') }}" alt="Previous"></i>
</a>
<a class="carousel-control-next" href="#services_slider" role="button" data-slide="next">
    <i><img src="{{ asset('images1/right-arrow.png') }}" alt="Next"></i>
</a>

        </div>
    </div>
</div>

      <!-- services section end -->
      <!-- about section start -->
      <div id="about" class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="about_text font-weight-bold">About Us</h1>
                  <p class="lorem_text">Luxurious Accommodations: Our rooms are meticulously designed to provide comfort and elegance, ensuring a restful stay.
                     Gourmet Dining: Indulge in culinary delights at our Restaurant, where our chefs curate exquisite menus that tantalize the taste buds.
                     Event Spaces: From intimate gatherings to grand celebrations, our versatile event spaces are perfect for any occasion.
                     Wellness Retreat: Rejuvenate your mind and body at our Spa Name, offering a range of rejuvenating treatments and fitness facilities.</p>
                  <div class="read_bt1"><a href="#">Read More</a></div>
               </div>
               <div class="col-md-6">
                  <div class="image_1"><img src="{{ asset ('images1/img-1.png')}}"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- furnitures section start -->
      {{-- <div class="furnitures_section layout_padding">
         <div class="container">
            <h1  class="our_text font-weight-bold">OUR furnitures</h1>
            <p class="ipsum_text">There are many variations of passages of Lorem Ipsum </p>
            <div class="furnitures_section2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="container_main">
                        <img src="{{ asset ('images1/img-2.png')}}" alt="Avatar" class="image">
                        <div class="overlay">
                           <a href="#" class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                           </a>
                        </div>
                     </div>
                     <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                     <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                  </div>
                  <div class="col-md-6">
                     <div class="container_main">
                        <img src="{{ asset ('images1/img-3.png')}}" alt="Avatar" class="image">
                        <div class="overlay">
                           <a href="#" class="icon" title="User Profile">
                           <i class="fa fa-search"></i>
                           </a>
                        </div>
                     </div>
                     <h3 class="temper_text">Tempor incididunt ut labore et dolore</h3>
                     <p class="dololr_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- furnitures section end --> --}}
      <!-- who section start -->
      
      <!-- who section end -->
      <!-- projects section start -->
      <div id="gallery" class="projects_section layout_padding mb-5">
    <div class="container">
        <h1 class="our_text font-weight-bold bg-warning">Our Gallery</h1>
        <p class="ipsum_text font-weight-bold">Choose Your Perfect Room for Family and Friends</p>
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                $roomTypesCount = count($roomTypes); // Count of all room types
                $itemsPerSlide = 4; // Number of room types per carousel item
                $slideCount = ceil($roomTypesCount / $itemsPerSlide); // Calculate the number of carousel items
                $currentRoomType = 0; // Initialize the room type index
                @endphp

                @for ($i = 0; $i < $slideCount; $i++)
                <div class="carousel-item @if($i === 0) active @endif">
                    <div class="projects_section2">
                        <div class="container_main2">
                            <div class="row">
                                @for ($j = 0; $j < $itemsPerSlide; $j++)
                                @if ($currentRoomType < $roomTypesCount)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="container_main1">
                                        <div class="text-center">
                                            <h1 class="text-light bg-dark font-weight-bold card-header">{{$roomTypes[$currentRoomType]->title}}</h1>
                                        </div>
                                        @foreach($roomTypes[$currentRoomType]->roomtypeimgs as $img)
                                        <a href="{{ Storage::url($img->img_src) }}" data-lightbox="rgallery">
                                            <img class="img-thumbnail"
                                                src="{{ Storage::url($img->img_src) }}"
                                                style="width: 250px; height: 200px;" alt="">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                @php
                                $currentRoomType++; // Move to the next room type
                                @endphp
                                @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
            
        </div>
    </div>
</div>

      <!-- projects section end -->
      <!-- client section start -->
      {{-- <div class="clients_section layout_padding">
         <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <h1 id="contact" class="client_text font-weight-bold">what is says our clients</h1>
                     <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-7.png')}}"></div>
                                 <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-8.png')}}"></div>
                                 <div class="quote_icon"><img src="{{asset ('images1/quote-icon.png')}}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="client_text">what is says our clients</h1>
                     <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-7.png') }}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png')}}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-8.png')}}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png') }}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="client_text">what is says our clients</h1>
                     <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-7.png')}}"></div>
                                 <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-8.png')}}"></div>
                                 <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <h1 class="client_text">what is says our clients</h1>
                     <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                     <div class="clients_section2 layout_padding">
                        <div class="client_1">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-7.png')}} "></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png')}}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                        <div class="client_2">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="image_7"><img src="{{ asset ('images1/img-8.png')}}"></div>
                                 <div class="quote_icon"><img src="{{ asset ('images1/quote-icon.png')}}"></div>
                              </div>
                              <div class="col-sm-9">
                                 <h1 class="loksans_text">loksans</h1>
                                 <p class="dolor_ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed  veniam, quis nostrud exercitation ullamco laboris nisi ut reprehenderit in voluptate velit</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
      <!-- client section end -->
      <!-- contact section start -->
      <div id="contact" class="contact_section layout_padding mt-5">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="contact_text font-weight-bold">CONTACT US</h1>
                  <div class="mail_sectin">
                     <input type="text" class="email-bt" placeholder="Name" name="Name">
                     <input type="text" class="email-bt" placeholder="Email" name="Name">
                     <input type="text" class="email-bt" placeholder="Phone Number" name="Name">
                     <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                     <div class="send_bt"><a href="#">SEND</a></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                  <div class="map-responsive">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.291959158495!2d125.52942491440728!3d8.950745993622478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32d76d8084ea9aa9%3A0x5519f06a39e23ee9!2sButuan%20City!5e0!3m2!1sen!2sph!4v1632777311261!5m2!1sen!2sph" width="600" height="500" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
</div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-sm-6">
                     <h1 class="customer_text">ABOUT US</h1>
                     <p class="footer_lorem_text">Discover unparalleled hospitality with our hotel management services. We strive to provide exceptional experiences for our guests.</p>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <h1 class="customer_text">CONTACT US</h1>
                     <p class="footer_lorem_text">Have questions or need assistance? Reach out to our dedicated team. We're here to ensure your stay is seamless and enjoyable.</p>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <h1 class="customer_text">USEFUL LINKS</h1>
                     <p class="footer_lorem_text1">Home<br>
                         Rooms & Suites<br>
                         Special Offers<br>
                         Events & Conferences<br>
                         Contact Us<br>
                         Privacy Policy
                     </p>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <h1 class="customer_text">OUR COMMITMENT</h1>
                     <p class="footer_lorem_text">Dedicated to excellence, we prioritize your comfort and satisfaction. Experience a blend of luxury and efficiency in our hotel management.</p>
                 </div>
             </div>
             <div class="input-group mb-3">
                 <input type="text" class="form-control" placeholder="Enter your email" aria-label="Enter your email" aria-describedby="basic-addon2">
                 <div class="input-group-append">
                     <span class="input-group-text" id="basic-addon2"><a href="#">Subscribe</a></span>
                 </div>
             </div>
         </div>
     </div>
     
      <!--  footer section end -->

      <!-- Javascript files-->
      

@section('scripts')
@endsection    
   </body>
</html>

@endsection