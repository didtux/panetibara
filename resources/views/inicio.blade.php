@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section-header">
            <h3 class="page__heading" style="font-size: 24px; color: white;">Reservas</h3>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('inicio') }}" class="btn btn-primary mb-4">Todas las reservas</a>

        <form method="GET" action="{{ route('inicio') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="fecha">Fecha de Reserva:</label>
                    <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                </div>
                <div class="col-md-4">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="pendiente" {{ request('estado') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="entregado" {{ request('estado') === 'entregado' ? 'selected' : '' }}>Entregado</option>
                        <option value="cancelado" {{ request('estado') === 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="buscar">&nbsp;</label>
                    <button type="submit" class="btn btn-primary form-control">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Reserva</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->created_at }}</td>
                        <td>{{ $reserva->estado }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-primary">Ver Detalles</a>
                                <a href="{{ route('reservas.editEstado', $reserva->id) }}" class="btn btn-warning">Cambiar Estado</a>
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @endforeach
                <!-- Agrega estos enlaces en el head de tu archivo blade o en tu layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-1E2lJp6ZvvuF/T4i1OAWqS6LPLpxx5h74a4wodVi+rs9K62VFDsPofn3orMAB8e/FS/6rHiVEJGzw5/DV5F4oyA==" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha512-oq3Dg3PB4Pb6Zz8pR1t4pOGuuCv5XszlSCY+2O16NLy+cXfgywRSggd2hYm3bS6PoiNRdWfFz+QgB2HAh1wqf/g=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-bG6bVef1VlVryt6r5M6DI2JHPvA0Q5/mfNEtUCuMWx9YiRyg6X/Lw8ZChMf4ex0UdVekP8p7E5oAwNjJvqPbfw==" crossorigin="anonymous"></script>

            </tbody>
        </table>
    </div>
@endsection
