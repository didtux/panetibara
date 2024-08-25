<!DOCTYPE html>
<html lang="es">

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

    <!-- Carousel Start -->
    <!--Este es nuestro carrusel donde podemos ver un poco obre lo que es panetibara -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Panetones Panetibara: El regalo perfecto para el </h2>
                        <h1 class="display-1 text-white m-0">ALMA</h1>
                        <h2 class="text-white m-0">* Desde 2023 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Del horno de Panetibara</h2>
                        <h1 class="display-1 text-white m-0">a tu corazón.</h1>
                        <h2 class="text-white m-0">* Desde 2023 *</h2>
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
<!--Final del carrusel -->



<!-- Video Publicitario final -->


    <!--En este apartado el usuario puede visualizar los productos que registramos en nuestro sistema-->
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

             <!--Division de panetones tradicionales-->
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
                <!--Division de panetones integrales-->
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
    <!--Fin de productos-->
    
    
    

    <div class="container-fluid py-5" id="productos">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Nuestros Paquetes</span></h1>
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
                            
                           
                            {{-- Precio con descuento --}}
                            @php
                                $precioConDescuento = $paquete->productos->sum('precio') * 0.7; // Aplicar un descuento del 30%
                            @endphp
                            <del class="text-primary mb-3"">Percio total: Bs.{{ $paquete->productos->sum('precio') }}</del>
                            <h5 class="text-primary mb-3"">Precio con 30% de descuento: Bs.{{ $precioConDescuento }}</h5>
    
                            <a class="menu-item reservation-button" href="{{ route('paquetes.show', ['paquete' => $paquete]) }}">
                                Reservar
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
    background-color: rgb(255, 215, 120); /* Fondo amarillo claro */
    color: rgb(0, 0, 0); /* Texto negro */
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.reservation-button:hover {
    background-color: rgb(116, 96, 44); /* Cambia el fondo al pasar el ratón sobre el botón */
    color: rgb(255, 255, 255); /* Cambia el color del texto al pasar el ratón sobre el botón */
}
/* Estilo para el contenedor del video */
    #video-publicitario {
        background-color: #f8f9fa; /* Cambia el color de fondo si es necesario */
        padding: 80px 0; /* Ajusta el espaciado según tus necesidades */
    }

    /* Estilo para el contenedor del iframe */
    #video-publicitario iframe {
        width: 100%;
        height: 500px;
    }


    </style>

    <!-- Sobre nosotros inicio -->
     <!--Vision Mision-->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Sobre Nosotros</h4>
                <h1 class="display-4">Servicio desde 2023</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Nuestra Misión</h1>
                    <h5 class="mb-3">Estamos comprometidos en brindar felicidad a la mesa de cada cliente durante esta temporada festiva a través de la exquisitez de nuestros panetones</h5>
                    <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Inicio</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;" alt="Image">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Nuestra Visión</h1>
                    <p>Ser líderes en la venta de panetones de alta calidad, reconocidos a nivel nacional e internacional por nuestra excelencia y constante innovación en sabores. Queremos ser una marca que inspire momentos especiales y enriquezca las celebraciones navideñas</p>
                    <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Inicio</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sobre nosotros final -->


    <!-- Servicio -->
    
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Nuestros Servicios</h4>
                <h1 class="display-4">Panetones relleno de pasas y frutas</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Entrega a puerta más rápida</h4>
                            <p class="m-0">"La entrega fue excepcionalmente rápida y eficiente. El producto llegó a mi puerta antes de lo esperado, y el servicio de entrega fue amable y profesional. ¡Definitivamente volveré a utilizar este servicio en el futuro!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Panetones de Gran Variedad</h4>
                            <p class="m-0">"Los panetones de esta marca ofrecen una increíble variedad de sabores y opciones. Desde los clásicos hasta las creaciones más innovadoras, siempre hay algo para todos los gustos. Me encanta explorar las diferentes opciones y sorprender a mi paladar con nuevos sabores en cada temporada navideña. ¡Estos panetones son el regalo perfecto para cualquier amante de los postres!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Panetones de la mejor calidad</h4>
                            <p class="m-0">"Los panetos que he probado son de la más alta calidad. Cada bocado es una explosión de sabor y frescura. La textura es perfecta, y se nota el cuidado en la selección de ingredientes. Estoy impresionado por la excelencia de estos panetos. ¡Sin duda, una delicia gourmet que merece la pena saborear!"</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Reserva de panetones en linea</h4>
                            <p class="m-0">"Reservar panetones en línea ha sido una experiencia conveniente y sin complicaciones. La plataforma de reserva es fácil de usar, y puedo elegir entre una amplia gama de panetones y opciones de entrega. No importa la época del año, siempre puedo garantizar que tendré los panetones que deseo para las festividades. ¡Un servicio que hace que la planificación navideña sea mucho más sencilla!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Servicios Fin -->
      <!-- Video Publicitario  -->




    <!-- Oferta -->
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">
            <h1 class="display-3 text-primary mt-3">30% OFF</h1>
            <h1 class="text-white mb-3">Oferta especial de su pedido los dias Martes</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Solo por el mes de agosto a diciembre</h4>
            <form class="form-inline justify-content-center mb-4">
             
            </form>
        </div>
    </div>
    <!-- Oferta fin -->


    <!-- Reserva -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">30% OFF</h1>
                                <h1 class="text-white">Para reservas en linea</h1>
                            </div>
                            <p class="text-white">"¡Celebra la temporada con PANETIBARA! Del horno a tu puerta, ordena tu panetón en línea y endulza cada momento con nuestro sabor inigualable. ¡Haz tu pedido hoy y deja que la magia de PANETIBARA llegue directo a tu hogar!"</p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente esta muy contento</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente esta muy comodo</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente esta con su familia</li>
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
    <!-- Reservatio -->


   


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