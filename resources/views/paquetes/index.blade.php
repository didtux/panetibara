@extends('layouts.app')

@section('content')
<div class="container">

    <div class="section-header">
        <h3 class="page__heading" style="font-size: 24px; color: white;">Lista de Paquetes</h3>
    </div>
    
    <a href="{{ route('paquetes.crear') }}" class="btn btn-primary mb-4">Nuevo Paquete</a>

    <div class="row">
        @foreach ($paquetes as $paquete)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $paquete->nombre }}</h4>
                        <p class="card-text">{{ $paquete->descripcion }}</p>
                        <p class="card-text">Precio Total: {{ $paquete->productos->sum('precio') }} Bs</p>
                        <h5 class="card-subtitle mb-2 text-muted">Productos en el Paquete:</h5>
                        <ul class="list-unstyled">
                            @foreach ($paquete->productos as $producto)
                                <li>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $producto->foto) }}" alt="Imagen de {{ $producto->nombre }}" class="mr-2" style="max-width: 50px;">
                                        {{ $producto->nombre }} - {{ $producto->descripcion }} - {{ $producto->precio }} Bs
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('paquetes.edit', $paquete) }}" class="btn btn-info">Editar</a>
                            <form action="{{ route('paquetes.destroy', $paquete) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
