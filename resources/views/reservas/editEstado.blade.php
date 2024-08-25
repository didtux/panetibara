@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section-header">
            <h3 class="page__heading" style="font-size: 24px; color: white;">Cambiar estado de la reserva</h3>
        </div>
        
        <form method="POST" action="{{ route('reservas.updateEstado', $reserva->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="estado">Nuevo Estado:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Pendiente" {{ $reserva->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Entregado" {{ $reserva->estado === 'Entregado' ? 'selected' : '' }}>Entregado</option>
                    <option value="Cancelado" {{ $reserva->estado === 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
