@extends('layouts.app')

@section('content')
<div class="container">
    <div class="section-header">
        <h3 class="page__heading" style="font-size: 24px; color: white;">Crear paquete</h3>
    </div>
    <form action="{{ route('paquetes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Paquete</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción del Paquete</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Selecciona los productos para el paquete:</label><br>
            @foreach ($productos as $producto)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="productos[]" value="{{ $producto->id }}">
                    <label class="form-check-label">{{ $producto->nombre }} - {{ $producto->descripcion }} - {{ $producto->precio }}Bs</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Crear Paquete</button>
    </form>
</div>
@endsection
