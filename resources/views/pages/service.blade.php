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
    <link href="css/style.min.css" rel="stylesheet">
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
                    <a href="{{ route('pages.show', 'contact') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Contact</a>
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


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Service</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Services</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


     <!-- Service Start -->
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
                            <h4><i class="fa fa-truck service-icon"></i>Faster Doorstep Delivery</h4>
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
    <!-- Service End -->

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
<!-- Footer End -->
   <!-- Footer End -->
<div style="position: fixed; top: 50%; right: 0; transform: translateY(-50%); z-index: 1000;">
    <button onclick="translatePage('es'); changeAssistant('es');" class="btn btn-light mb-2" style="display: flex; align-items: center;">
        <img src="{{ asset('img/spa.png') }}" alt="Spanish" style="width: 20px; height: 20px; margin-right: 5px;">
        Spanish
    </button>
    <button onclick="translatePage('en'); changeAssistant('en');" class="btn btn-light" style="display: flex; align-items: center;">
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

function changeAssistant(lang) {
    // Eliminar el asistente existente si ya está cargado
    var existingChatbotScript = document.querySelector('script[src*="WatsonAssistantChatEntry.js"]');
    if (existingChatbotScript) {
        existingChatbotScript.remove();
    }

    // Configura el asistente basado en el idioma seleccionado
    var integrationID, serviceInstanceID;
    if (lang === 'es') {
        integrationID = "9a9b17c6-8732-4c4d-89a7-821abe6a235f"; // ID del asistente en español
        serviceInstanceID = "23fb125e-bdc7-474f-ac9b-5e12851faec1";
    } else {
        integrationID = "31cb9d15-36ef-48ee-b9c6-f2d0c9e8c361"; // ID del asistente en inglés
        serviceInstanceID = "23fb125e-bdc7-474f-ac9b-5e12851faec1";
    }

    // Solo carga el asistente si no está ya cargado
    if (!existingChatbotScript) {
        window.watsonAssistantChatOptions = {
            integrationID: integrationID,
            region: "us-east",
            serviceInstanceID: serviceInstanceID,
            onLoad: async (instance) => { await instance.render(); }
        };
        
        setTimeout(function(){
            const t=document.createElement('script');
            t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
            document.head.appendChild(t);
        });
    }
}

// Cargar el asistente en inglés por defecto
changeAssistant('en');
</script>


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
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
