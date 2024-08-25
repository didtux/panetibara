<?php

namespace App\Http\Controllers;
use App\Models\Reserva;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(Request $request)
{
    // Filtrar por fecha
    $reservas = Reserva::when($request->filled('fecha'), function ($query) use ($request) {
        return $query->whereDate('created_at', $request->input('fecha'));
    })
    // Filtrar por estado
    ->when($request->filled('estado'), function ($query) use ($request) {
        return $query->where('estado', $request->input('estado'));
    })
    ->get();

    return view('inicio', compact('reservas'));
}

}
