<!-- resources/views/pdf/reserva.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalles del pedido</title>
    <style>
        /* Estilos CSS personalizados para el PDF */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px; /* Ajusta el tamaño del logo según tu necesidad */
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            margin-bottom: 5px;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
    </style>    
</head>
<body>
    <div class="container">
       
        <div class="header">
         
            <h1>PANETIBARA</h1>
        </div>
        <h1>Detalles del pedido</h1>
        <p><strong>Nombre del Cliente:</strong> {{ $reserva->nombre }}</p>
        <p><strong>Cédula de Identidad (CI):</strong> {{ $reserva->ci }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $reserva->correo }}</p>
        <p><strong>Dirección de entrega:</strong> {{ $reserva->direccion }}</p>
        
        <p><strong>Indicaciones de la entrega:</strong> {{ $reserva->indicaciones }}</p>
        <p><strong>Fecha de entrega:</strong> {{ $reserva->fecha }}</p>

        <h2>Detalles del Paquete</h2>
        <p><strong>Nombre del Paquete:</strong> {{ $paquete->nombre }}</p>
       
        <p><strong>Precio Total del Paquete:</strong> {{ $paquete->productos->sum('precio')* 0.7;  }}Bs</p>

        <h3>Productos en el Paquete:</h3>
        <ul>
            @foreach ($paquete->productos as $producto)
                <li>{{ $producto->nombre }}  </li>
            @endforeach
        </ul>

        <p>¡Gracias por realizar tu pedido!</p>
       <p> Del horno de Panetibara a tu corazón.</p> 
       <p> Desde 2023 </p> 
    </div>
</body>
</html>
