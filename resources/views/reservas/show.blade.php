<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
    </head>
<body> 
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">
                    <img src="{{asset('img/logo.png')}}" alt="Logo" width="90" height="80" class="d-inline-block align-text-top">
                    
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
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Detalles del pedido</h1>
           
        </div>
    </div>

    <div class="container-fluid py-5" id="quienes">
        <div class="container">          
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Detalles de entrega</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    @if (!empty($fechasReserva))
                    <h2>Fecha de entrega</h2>
                    <ul>
                        @foreach ($fechasReserva as $fecha)
                            @php
                                $fechas = explode(', ', $fecha); // Divide las fechas usando la coma y el espacio como separadores
                            @endphp
                            @foreach ($fechas as $fechaIndividual)
                                <li>Fecha de entrega: {{ \Carbon\Carbon::parse($fechaIndividual)->format('d/m/Y') }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                @else
                    <p>No hay fechas de entregas disponibles.</p>
                @endif
                
                
        <h2>Detalles del Paquete</h2>
        <p>Nombre del Paquete: {{ $paquete->nombre }}</p>
        <p>Descripción del Paquete: {{ $paquete->descripcion }}</p>
        <p>Precio Total con el descuento: {{ $paquete->productos->sum('precio')* 0.7;  }}Bs</p>
        <h2>Productos en el Paquete</h2>
        <ul>
            @foreach ($paquete->productos as $producto)
              
            <li>{{ $producto->nombre }} - {{ $producto->descripcion }} - {{ $producto->precio }}Bs</li>
            
            @if ($producto->foto)
            <br>
            <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto del producto" width="100">
        @endif
            @endforeach
        </ul>

        <h2>Detalles del pedido</h2>
        
        <p>Nombre: {{ $reserva->nombre }}</p>
        <p>Cédula de Identidad (CI): {{ $reserva->ci }}</p>
        <p>Telefono: {{ $reserva->telefono }}</p>
        <p>Correo: {{ $reserva->correo }}</p>
        <p>Dirección: {{ $reserva->direccion }}</p>
        <p>Indicaciones: {{ $reserva->indicaciones }}</p>
       
       

        <h2>Descargar PDF</h2>
     
        @php
        $whatsappMessage = "¡Hola! Aquí están los detalles de mi pedido:%0A";
        $whatsappMessage .= "Fecha de entrega: " . urlencode($reserva->created_at) . "%0A";
        $whatsappMessage .= "Paquete: " . urlencode($paquete->nombre) . "%0A";
        $whatsappMessage .= "Descripción del Paquete: " . urlencode($paquete->descripcion) . "%0A";
        $whatsappMessage .= "Nombre: " . urlencode($reserva->nombre) . "%0A";
        $whatsappMessage .= "Cédula de Identidad (CI): " . urlencode($reserva->ci) . "%0A";
    
        $precioConDescuento = $paquete->productos->sum('precio') * 0.7;
        $descuento = $paquete->productos->sum('precio') - $precioConDescuento;
    
        $whatsappMessage .= "Precio original Bs: " . urlencode($paquete->productos->sum('precio')) . "%0A";
        $whatsappMessage .= "Descuento 30%: " . urlencode($descuento) . "%0A";
        $whatsappMessage .= "Precio con descuento Bs: " . urlencode($precioConDescuento) . "%0A";
    
        $whatsappMessage .= "Correo: " . urlencode($reserva->correo) . "%0A";
        $whatsappMessage .= "Dirección de entrega: " . urlencode($reserva->direccion) . "%0A";
        $whatsappMessage .= "Indicaciones: " . urlencode($reserva->indicaciones) . "%0A";
    @endphp
    
    <a href="{{ route('reservas.pdf', $reserva->id) }}" class="btn btn-primary py-2 px-4 my-2">Descargar PDF</a>
    <a href="https://api.whatsapp.com/send?phone=59165545849&text={{ $whatsappMessage }}" target="_blank" class="btn btn-primary py-2 px-4 my-2">Enviar comprobante del pedido a WhatsApp</a>
            </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                   <img class="img-fluid animated pulse infinite" src="{{ asset('img/logo.png') }}">    
                </div>
            </div>
        </div>
    </div>

        


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
    <a href="https://wa.me/59165545849" target="_blank" class="back-to-top">
    <img src="https://cdn.pixabay.com/photo/2015/08/03/13/58/whatsapp-873316_1280.png" width="50px">
    </a>
  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
    <script src="{{asset('js/main.js')}}"></script>                  
</body>
</html>        