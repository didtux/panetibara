@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Reserva</h1>
        <p>Fecha de Reserva: {{ $reserva->created_at }}</p>
        
        <h2>Detalles del Paquete</h2>
        <p>Nombre del Paquete: {{ $paquete->nombre }}</p>
        <p>Descripción del Paquete: {{ $paquete->descripcion }}</p>
        
        <h2>Productos en el Paquete</h2>
        <ul>
            @foreach ($paquete->productos as $producto)
              
            <li>{{ $producto->nombre }} - {{ $producto->descripcion }} - ${{ $producto->precio }}</li>
            
            @if ($producto->foto)
            <br>
            <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto del producto" width="100">
        @endif
            @endforeach
        </ul>

        <h2>Detalles de la Reserva</h2>
        <p>Horario: {{ $reserva->horario }}</p>
        <p>Nombre: {{ $reserva->nombre }}</p>
        <p>Correo: {{ $reserva->correo }}</p>
        <p>Dirección de Recogida: {{ $reserva->direccion }}</p>
        <p>Hora de Reserva: {{ $reserva->hora_reserva }}</p>
        <p>Cédula de Identidad (CI): {{ $reserva->ci }}</p>

        <h2>Descargar PDF</h2>
     
        @php
        $whatsappMessage = "¡Hola! Aquí están los detalles de mi reserva:%0A";
        $whatsappMessage .= "Fecha de Reserva: " . urlencode($reserva->created_at) . "%0A";
        $whatsappMessage .= "Paquete: " . urlencode($paquete->nombre) . "%0A";
        $whatsappMessage .= "Descripción del Paquete: " . urlencode($paquete->descripcion) . "%0A";
        $whatsappMessage .= "Horario: " . urlencode($reserva->horario) . "%0A";
        $whatsappMessage .= "Nombre: " . urlencode($reserva->nombre) . "%0A";
        $whatsappMessage .= "Correo: " . urlencode($reserva->correo) . "%0A";
        $whatsappMessage .= "Dirección de Recogida: " . urlencode($reserva->direccion) . "%0A";
        $whatsappMessage .= "Hora de Reserva: " . urlencode($reserva->hora_reserva) . "%0A";
        $whatsappMessage .= "Cédula de Identidad (CI): " . urlencode($reserva->ci);
    @endphp
 
   <a href="{{ route('reservas.pdf', $reserva->id) }}" class="btn btn-primary">Descargar PDF</a>
   <a href="https://api.whatsapp.com/send?phone=59169882861&text={{ $whatsappMessage }}" class="btn btn-primary">Enviar comprobante de reserva a WhatsApp</a>
   <a href="{{ route('principal')}}" class="btn btn-primary"> Inicio</a>
    </div>
@endsection
