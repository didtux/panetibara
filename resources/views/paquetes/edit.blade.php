@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Paquete</h1>
    <form action="{{ route('paquetes.update', $paquete) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Paquete</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $paquete->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción del Paquete</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $paquete->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label>Selecciona los productos para el paquete:</label><br>
            @foreach ($productos as $producto)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="productos[]" value="{{ $producto->id }}" @if ($paquete->productos->contains($producto->id)) checked @endif>
                    <label class="form-check-label">{{ $producto->nombre }} - {{ $producto->descripcion }} - ${{ $producto->precio }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Paquete</button>
    </form>
</div>
@endsection
