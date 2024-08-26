<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Panetibara</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css\style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">
                    <img src="img/logo.png" alt="Logo" width="90" height="80" class="d-inline-block align-text-top">
                    
                </h1>
                
                
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="{{ route('principal.index') }}" class="nav-item nav-link{{ request()->is('/') ? ' active' : '' }}">Home</a>
                    <a href="{{ route('pages.show', 'about') }}" class="nav-item nav-link{{ request()->is('about') ? ' active' : '' }}">About</a>
                    <a href="{{ route('pages.show', 'service') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Service</a>
                    <a href="{{ route('pages.show', 'menu') }}" class="nav-item nav-link{{ request()->is('menu') ? ' active' : '' }}">Menu</a>
                    <a href="{{ route('pages.show', 'testimonial') }}" class="nav-item nav-link{{ request()->is('testimonial') ? ' active' : '' }}">Testimonials</a>
                    
                
                
                    <a  href="{{ route('pages.show', 'contact') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Contact</a>
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/inicio') }}" class="nav-item nav-link" >Admin Panel</a>
                    @else
                        <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                    @endauth
                @endif
                </div>
            </div>
        </div>
    </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <!--This is our carousel where we can see a little about what Panetibara is-->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Panetibara Panetones: The perfect gift for the </h2>
                        <h1 class="display-1 text-white m-0">SOUL</h1>
                        <h2 class="text-white m-0">* Since 2023 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">From Panetibara's oven</h2>
                        <h1 class="display-1 text-white m-0">to your heart.</h1>
                        <h2 class="text-white m-0">* Since 2023 *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- End of Carousel -->



    <!-- End of Promotional Video -->


    <!--In this section, the user can view the products we have registered in our system-->
    <div class="container-fluid py-5" id="prods">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Product List</span></h1>
            </div>

            <div class="container mb-4 text-center">
                <form action="{{ route('principal.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search products">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <a href="{{ route('principal.index') }}" class="btn btn-primary text-dark">View all products</a>
            </div>
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu and Prices</h4>
            </div>

             <!--Traditional Panetones Section-->
            <div class="row g-4">
                <div class="col-lg-6">
                    <h2 class="mb-5 text-dark">Traditional Panetones</h2>
                    
                    @foreach($productos as $producto)
                        @if($producto->tipo === 'Tradicional')
                            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.7s">
                                <div class="row align-items-center mb-5">
                                    <div class="col-4 col-sm-3">
                                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('storage/' . $producto->foto) }}" alt="">
                                        <h5 class="menu-price text-dark">{{ floor($producto->precio) }}Bs.</h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <h1 class="mb-5 text-dark">{{ $producto->nombre }}</h1>
                                        <h5 class="text-primary"><b>Product line:</b> {{ $producto->tipo }}</h5>
                                        <h5 class="text-primary">{{ $producto->descripcion }}</h5>
                                    </div>
                                </div> 
                            </div>
                        @endif
                    @endforeach
                </div>
                <!--Integral Panetones Section-->
                <div class="col-lg-6">
                    <h2 class="mb-5 text-dark">Integral Panetones</h2>
                    @foreach($productos as $producto)
                        @if($producto->tipo === 'Integral')
                            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.7s">
                                <div class="row align-items-center mb-5">
                                    <div class="col-4 col-sm-3">
                                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('storage/' . $producto->foto) }}" alt="">
                                        <h5 class="menu-price text-dark">{{ floor($producto->precio) }}Bs.</h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <h1 class="mb-5 text-dark">{{ $producto->nombre }}</h1>
                                        <h5 class="text-primary"><b>Product line:</b> {{ $producto->tipo }}</h5>

                                        <h5 class="text-primary">{{ $producto->descripcion }}</h5>
                                    </div>
                                </div> 
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End of Products-->
    
    
    

    <div class="container-fluid py-5" id="productos">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Our Packages</span></h1>
            </div>
            <div class="row g-4">
                @foreach ($paquetes as $paquete)
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                        <div class="product-item text-center border h-100 p-4">
                            @if ($paquete->productos->isNotEmpty())
                                <img class="img-fluid mb-4" src="{{ asset('storage/' . $paquete->productos->first()->foto) }}">
                            @endif
                            <a href="{{ route('paquetes.show', ['paquete' => $paquete]) }}" class="h6 d-inline-block mb-2">{{ $paquete->nombre }}</a>
                            <p class="mb-2">{{ $paquete->descripcion }}</p>
                            
                           
                            {{-- Price with discount --}}
                            @php
                                $precioConDescuento = $paquete->productos->sum('precio') * 0.7; // Apply a 30% discount
                            @endphp
                            <del class="text-primary mb-3"">Total price: Bs.{{ $paquete->productos->sum('precio') }}</del>
                            <h5 class="text-primary mb-3"">Price with 30% discount: Bs.{{ $precioConDescuento }}</h5>
    
                            <a class="menu-item reservation-button" href="{{ route('paquetes.show', ['paquete' => $paquete]) }}">
                                Reserve
                            </a>
                                                                            
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <style>
        .reservation-button {
    display: inline-block;
    padding: 10px 20px;
    border: 1px solid rgb(145, 97, 43);
    border-radius: 7px;
    background-color: rgb(255, 215, 120); /* Light yellow background */
    color: rgb(0, 0, 0); /* Black text */
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.reservation-button:hover {
    background-color: rgb(116, 96, 44); /* Change background when hovering over the button */
    color: rgb(255, 255, 255); /* Change text color when hovering over the button */
}
/* Style for the video container */
    #video-publicitario {
        background-color: #f8f9fa; /* Change background color if necessary */
        padding: 80px 0; /* Adjust spacing as needed */
    }

    /* Style for the iframe container */
    #video-publicitario iframe {
        width: 100%;
        height: 500px;
    }


    </style>

    <!-- About Us Start -->
     <!--Vision Mission-->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Service since 2023</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Mission</h1>
                    <h5 class="mb-3">We are committed to bringing happiness to every customer's table during this festive season through the exquisiteness of our panettones</h5>
                    <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Home</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;" alt="Image">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>To be leaders in the sale of high-quality panettones, recognized nationally and internationally for our excellence and constant innovation in flavors. We aim to be a brand that inspires special moments and enriches Christmas celebrations</p>
                    <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->


    <!-- Service -->
    
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Panettones filled with raisins and fruits</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Faster door-to-door delivery</h4>
                            <p class="m-0">"The delivery was exceptionally fast and efficient. The product arrived at my door earlier than expected, and the delivery service was friendly and professional. I will definitely use this service again in the future!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Wide Variety of Panettones</h4>
                            <p class="m-0">"The panettones from this brand offer an incredible variety of flavors and options. From the classics to the most innovative creations, there is always something for every taste. I love exploring the different options and surprising my palate with new flavors each holiday season. These panettones are the perfect gift for any dessert lover!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Best Quality Panettones</h4>
                            <p class="m-0">"The panettones I have tried are of the highest quality. Every bite is an explosion of flavor and freshness. The texture is perfect, and the care in selecting ingredients is evident. I am impressed with the excellence of these panettones. Definitely a gourmet delight worth savoring!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Online Panettone Reservation</h4>
                            <p class="m-0">"Reserving panettones online has been a convenient and hassle-free experience. The reservation platform is easy to use, and I can choose from a wide range of panettones and delivery options. No matter the time of year, I can always ensure I have the panettones I want for the holidays. A service that makes holiday planning so much easier!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Services -->
      <!-- Promotional Video  -->




    <!-- Offer -->
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">
            <h1 class="display-3 text-primary mt-3">30% OFF</h1>
            <h1 class="text-white mb-3">Special offer on your orders on Tuesdays</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Only from August to December</h4>
            <form class="form-inline justify-content-center mb-4">
             
            </form>
        </div>
    </div>
    <!-- End of Offer -->


    <!-- Reservation -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">30% OFF</h1>
                                <h1 class="text-white">For online reservations</h1>
                            </div>
                            <p class="text-white">"Celebrate the season with PANETIBARA! From our oven to your door, order your panettone online and sweeten every moment with our unparalleled flavor. Place your order today and let the magic of PANETIBARA arrive directly at your home!"</p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>The customer is very happy</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>The customer is very comfortable</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>The customer is with their family</li>
                            </ul>
                        </div>
                    </div>
                   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Reservation -->


   


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get in Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>89 Lanza Street, La Paz, Bolivia</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+591 64100624</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>lospanetibaras@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Follow us on our social networks:</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Opening Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Latest News</h4>
                <p></p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Panetibara</a>. All Rights Reserved.</a></p>
            
        </div>
    </div>
    <div style="position: fixed; top: 50%; right: 0; transform: translateY(-50%); z-index: 1000;">
        <button onclick="translatePage('es')" class="btn btn-light mb-2" style="display: flex; align-items: center;">
            <img src="{{ asset('img/spa.png') }}" alt="Spanish" style="width: 20px; height: 20px; margin-right: 5px;">
            Spanish
        </button>
        <button onclick="translatePage('en')" class="btn btn-light" style="display: flex; align-items: center;">
            <img src="{{ asset('img/us.png') }}" alt="English" style="width: 20px; height: 20px; margin-right: 5px;">
            English
        </button>
    </div>
    <div id="google_translate_element"></div>

    <script>
     function translatePage(lang) {
    if (lang === 'en') {
        // Recarga la página para mostrar el contenido original en inglés
        location.reload();
    } else {
        var googleTranslateElement = document.createElement('script');
        googleTranslateElement.type = 'text/javascript';
        googleTranslateElement.async = true;
        googleTranslateElement.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        document.head.appendChild(googleTranslateElement);

        window.googleTranslateElementInit = function() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: lang,
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        };
    }
}

    </script>    
    <!-- Footer End -->
    <script>
        window.watsonAssistantChatOptions = {
          integrationID: "31cb9d15-36ef-48ee-b9c6-f2d0c9e8c361", // The ID of this integration.
          region: "us-east", // The region your integration is hosted in.
          serviceInstanceID: "23fb125e-bdc7-474f-ac9b-5e12851faec1", // The ID of your service instance.
          onLoad: async (instance) => { await instance.render(); }
        };
        setTimeout(function(){
          const t=document.createElement('script');
          t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
          document.head.appendChild(t);
        });
      </script>
    <!-- Back to Top -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="js\jqBootstrapValidation.min.js"></script>
    <script src="contact.js"></script>

    <!-- Template Javascript -->
    <script src="js\main.js"></script>
</body>

</html>
