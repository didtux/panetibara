@extends('layouts.app')

@section('content')
<div class="section-header">
    <h3 class="page__heading" style="font-size: 24px; color: white;"> Agregar producto</h3>
</div>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select  class="form-control" name="tipo" id="tipo" required>
<option value="Tradicional"> Tradicional</option>
<option value="Integral"> Integral</option>

            </select>
          
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
@endsection
