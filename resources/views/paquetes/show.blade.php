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
                    <a href="{{ route('pages.show', 'contact') }}" class="nav-item nav-link{{ request()->is('service') ? ' active' : '' }}">Contactos</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/inicio') }}" class="nav-item nav-link" >Panel de administracion</a>
                        @else
                            <a href="{{ url('/login') }}" class="nav-item nav-link">Iniciar sesion</a>
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Reservacion</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Hogar</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Reservacion</p>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" id="direccion">
        <div class="container">          
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Reservar Paquete</h1>
                <h1 class="text-primary mb-3"><span class="fw-light text-dark"> {{ $paquete->nombre }}</h1>
            </div>
            <div class="container-fluid my-5">
                <div class="container">
                    <div class="reservation position-relative overlay-top overlay-bottom">
                        <div class="row align-items-center">
                            <div class="col-lg-6 my-5 my-lg-0">
                                <div class="p-5">
                                    <p class="text-white">"¡Celebra la temporada con PANETIBARA! Del horno a tu puerta, ordena tu panetón en línea y endulza cada momento con nuestro sabor inigualable. ¡Haz tu pedido hoy y deja que la magia de PANETIBARA llegue directo a tu hogar!"</p>
                                    <ul class="list-inline text-white m-0">
                                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente está muy contento</li>
                                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente está muy cómodo</li>
                                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>El cliente está con su familia</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn">
                                <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                                    <h1 class="text-white mb-4 mt-5">Reserva tu Panetón</h1>
                                    @if (session()->has('errors'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach (session('errors')->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <p class="text-white mb-4 mt-5">{{ $paquete->descripcion }}</p>
                                    {{-- Precio con descuento --}}
                                    @php
                                        $precioConDescuento = $paquete->productos->sum('precio') * 0.7; // Aplicar un descuento del 30%
                                    @endphp
                                    <del class="text-primary mb-3">Precio original: Bs.{{ $paquete->productos->sum('precio') }}</del>
                                    <h5 class="text-primary mb-3">Precio con 30% de descuento: Bs.{{ $precioConDescuento }}</h5>
                                    <ul class="text-white mb-4 mt-5">
                                        @foreach ($paquete->productos as $producto)
                                            <li class="text-white mb-4 mt-5">{{ $producto->nombre }} - {{ $producto->descripcion }} - {{ $producto->precio }}Bs</li>
                                            @if ($producto->foto)
                                                <br>
                                                <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto del producto" width="100">
                                            @endif
                                        @endforeach
                                    </ul>
                                    <form method="POST" action="{{ route('reservas.store') }}">
                                        @csrf
                                        <input type="hidden" name="paquete_id" value="{{ $paquete->id }}">
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="nombre">Nombre completo:</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" 
                                                pattern="[A-Za-z\s]{1,30}" title="El nombre debe contener solo letras y tener un máximo de 30 caracteres." required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="telefono">Teléfono:</label>
                                            <input type="text" name="telefono" id="telefono" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" 
                                                pattern="\d{8}" title="El teléfono debe contener exactamente 8 dígitos." required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="correo">Correo:</label>
                                            <input type="email" name="correo" id="correo" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="ci">Cédula de Identidad (CI):</label>
                                            <input type="text" name="ci" id="ci" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" 
                                                pattern="\d{6,14}" title="El CI debe tener entre 6 y 14 dígitos." required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="direccion">Dirección:</label>
                                            <input type="text" name="direccion" id="direccion" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" 
                                                pattern="[A-Za-z0-9\s#\-]+" title="La dirección puede contener letras, números, espacios y los caracteres '#' y '-'." required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="indicaciones">Indicaciones para la entrega:</label>
                                            <input type="text" name="indicaciones" id="indicaciones" class="form-control bg-transparent border-primary p-4 text-white mb-4 mt-5" 
                                                pattern="[A-Za-z0-9\s#\-]+" title="Las indicaciones pueden contener letras, números, espacios y los caracteres '#' y '-'." required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label class="text-white mb-4 mt-5" for="fecha">Fecha de envío:</label>
                                            <input type="text" name="fecha" id="fecha" class="form-control bg-transparent border-primary text-white mb-4 mt-1" required>
                                        </div>
                            
                                        <button type="submit" class="btn btn-primary py-2 px-4">Reservar</button>
                            
                                        @if (session('pdfPath'))
                                            <h2>Descargar PDF</h2>
                                            <a href="{{ asset(session('pdfPath')) }}" class="add-to-cart py-1 mr-1">Descargar PDF</a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
  
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtén las fechas deshabilitadas desde PHP
            var fechasDeshabilitadas = @json($fechasDeshabilitadas);

            // Inicializar Flatpickr
            flatpickr("#fecha", {
                dateFormat: "Y-m-d",
                minDate: new Date().fp_incr(2), // Utiliza la función fp_incr para la fecha mínima
                disable: fechasDeshabilitadas,
                onChange: function (selectedDates, dateStr, instance) {
                    document.getElementById('fechas_seleccionadas').value = JSON.stringify(selectedDates);
                }
            });
        });
    </script>
    
    <style>
        /* Agrega estilos CSS para las fechas disponibles y ocupadas */
        .fecha {
            display: inline-block;
            margin: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
    
        .disponible {
            background-color: green;
            color: white;
        }
    
        .ocupada {
            background-color: red;
            color: white;
        }
    </style>

    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Ponerse en Contacto</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>89 Calle Lanza, La Paz, Bolivia</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+591 64100624</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>lospanetibaras@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Síguenos</h4>
                <p>Síguenos en nuestras redes sociales:</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Horario de Apertura</h4>
                <div>
                    <h6 class="text-white text-uppercase">Lunes - Viernes</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Sábados - Domingos</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Nuevas Noticias</h4>
                <p></p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Correo Electrónico">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Panetibara</a>. All Rights Reserved.</p>
      
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
    <script src="{{asset('js/main.js')}}"></script>                
</body>
</html>
