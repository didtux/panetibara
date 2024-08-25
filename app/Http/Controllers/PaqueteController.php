<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Producto;
use App\Models\Reserva;

class PaqueteController extends Controller
{
   
    public function show($id)
    {
        $paquete = Paquete::findOrFail($id);
        $reservas = Reserva::where('paquete_id', $id)->get();
        $fechaMinima = now()->addDays(2)->format('Y-m-d');
        $fechasOcupadas = [];
        $fechasDeshabilitadas = Reserva::where('fecha', '>=', now()->format('Y-m-d'))
        ->groupBy('fecha')
        ->havingRaw('COUNT(*) >= 5')
        ->pluck('fecha')
        ->map(function ($fecha) {
            return Carbon::parse($fecha)->format('Y-m-d');
        });
        foreach ($reservas as $reserva) {
            $fechasReserva = $reserva->fecha; // No es necesario decodificar aquí
            if (is_string($fechasReserva)) {
                $fechasReserva = json_decode($fechasReserva, true); // Solo decodifica si es una cadena válida
                if (is_array($fechasReserva)) {
                    $fechasOcupadas = array_merge($fechasOcupadas, $fechasReserva);
                }
            }
        }
    
        return view('paquetes.show', compact('paquete','fechaMinima', 'reservas', 'fechasOcupadas','fechasDeshabilitadas'));
    }
    


    public function index()
{

    $paquetes = Paquete::all();
    return view('paquetes.index', compact('paquetes'));
}
public function crear()
{
    $productos = Producto::all();
    return view('paquetes.crear', compact('productos'));
}


    public function store(Request $request)
    {
        $paquete = Paquete::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        $paquete->productos()->sync($request->productos);

        return redirect()->route('paquetes.index')->with('success', 'Paquete creado exitosamente.');
    }
    public function edit(Paquete $paquete)
{
    $productos = Producto::all();
    return view('paquetes.edit', compact('paquete', 'productos'));
}

public function update(Request $request, Paquete $paquete)
{
    $paquete->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
    ]);

    $paquete->productos()->sync($request->productos);

    return redirect()->route('paquetes.index')->with('success', 'Paquete actualizado exitosamente.');
}
public function destroy(Paquete $paquete)
{
    $paquete->delete();
    return redirect()->route('paquetes.index')->with('success', 'Paquete eliminado exitosamente.');
}


}
