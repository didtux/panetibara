@extends('layouts.app')

@section('content')
<div class="container">
    <div class="section-header">
        <h3 class="page__heading" style="font-size: 24px; color: white;">Lista de Productos</h3>
    </div>
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
           
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->tipo }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>Bs{{ $producto->precio }}</td>
                        <td><img src="{{ asset('storage/' . $producto->foto) }}" alt="Imagen de {{ $producto->nombre }}" style="max-width: 100px;"></td>
                        <td>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-info btn-sm mr-1">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
