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
                    <a href="{{ route('principal.index') }}" class="nav-item nav-link{{ request()->is('/') ? ' active' : '' }}">Hogar</a>
                    <a href="{{ route('pages.show', 'about') }}" class="nav-item nav-link{{ request()->is('about') ? ' active' : '' }}">Acerca de</a>
                    <a href="{{ route('pages.show', 'service') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Servicio</a>
                    <a href="{{ route('pages.show', 'menu') }}" class="nav-item nav-link{{ request()->is('menu') ? ' active' : '' }}">Menu</a>
                    <a href="{{ route('pages.show', 'testimonial') }}" class="nav-item nav-link{{ request()->is('testimonial') ? ' active' : '' }}">Testimonios</a>
                    
                
                
                    <a  href="{{ route('pages.show', 'contact') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Contactos</a>
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/inicio') }}" class="nav-item nav-link" >Panel de administracion</a>
                    @else
                        <a href="{{ url('/login') }}" class="nav-item nav-link">Iniciar sesion</a>
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
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Hogar</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Menu</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


     <!-- Menu Start -->
     <div class="container-fluid py-5" id="prods">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Lista de Productos</span></h1>
            </div>
            <div class="container mb-4 text-center">
                <form action="{{ route('principal.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Buscar productos">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
                <a href="{{ route('principal.index') }}" class="btn btn-primary text-dark">Ver todos los productos</a>
            </div>
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu y Precios</h4>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <h2 class="mb-5 text-dark">Panetones Tradicionales</h2>
                    
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
                                        <h5 class="text-primary"><b>Linea de producto:</b> {{ $producto->tipo }}</h5>
                                        <h5 class="text-primary">{{ $producto->descripcion }}</h5>
                                    </div>
                                </div> 
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-5 text-dark">Panetones Integrales</h2>
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
                                        <h5 class="text-primary"><b>Linea de producto:</b> {{ $producto->tipo }}</h5>

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
    

   <!-- Footer Start -->
   <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
    <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Ponerse en Contacto</h4>
            <p><i class="fa fa-map-marker-alt mr-2"></i>89 Calle Lanza,La Paz ,Bolivia</p>
            <p><i class="fa fa-phone-alt mr-2"></i>+591 64100624</p>
            <p class="m-0"><i class="fa fa-envelope mr-2"></i>lospanetibaras@gmail.com</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Siganos</h4>
            <p>Siganos en nuestras redes sociales como:</p>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Horario Apertura</h4>
            <div>
                <h6 class="text-white text-uppercase">Lunes - Viernes</h6>
                <p>8.00 AM - 8.00 PM</p>
                <h6 class="text-white text-uppercase">Sabados - Domingos</h6>
                <p>2.00 PM - 8.00 PM</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Nuevas Noticias</h4>
            <p></p>
            <div class="w-100">
                <div class="input-group">
                    <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Correo Electronico">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-3">Ingresar</button>
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


<script>
    window.watsonAssistantChatOptions = {
      integrationID: "9a9b17c6-8732-4c4d-89a7-821abe6a235f", // The ID of this integration.
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