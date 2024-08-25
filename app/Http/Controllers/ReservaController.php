<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use PDF;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{

    public function editEstado($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('reservas.editEstado', compact('reserva'));
    }

    public function updateEstado(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = $request->input('estado');
        $reserva->save();

        return redirect('inicio')->with('success', 'Estado de reserva actualizado exitosamente.');
    }
    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        $fechasReserva = json_decode($reserva->fecha);
        $paquete = Paquete::findOrFail($reserva->paquete_id);
        $fechasDeshabilitadas = Reserva::where('fecha', '>=', now()->format('Y-m-d'))
        ->groupBy('fecha')
        ->havingRaw('COUNT(*) >= 5')
        ->pluck('fecha')
        ->map(function ($fecha) {
            return Carbon::parse($fecha)->format('Y-m-d');
        });
        // Decodificar el JSON de fecha en un arreglo de fechas
        $fechasReserva = json_decode($reserva->fecha);
    
        // Calcular la fecha mínima permitida
        $fechaMinima = now()->addDays(2)->format('Y-m-d');
    
        return view('reservas.show', compact('reserva', 'paquete', 'fechasDeshabilitadas','fechasReserva', 'fechaMinima'));
    }
    

    
public function store(Request $request)
{
    // Validación del formulario
    $validator = Validator::make($request->all(), [
        'nombre' => 'required',
        'telefono' => 'required',
        'correo' => 'required|email',
        'direccion' => 'required',
        'indicaciones' => 'required',
        'fecha' => [
            'required',
            'date_format:Y-m-d',
            // Validación adicional para permitir solo fechas dos días después de la fecha actual
            function ($attribute, $value, $fail) {
                $fechaMinima = now()->addDays(2)->format('Y-m-d');
                if (Carbon::parse($value)->isBefore($fechaMinima)) {
                    $fail('La fecha de reserva debe ser al menos dos días después de la fecha actual.');
                }
            },
        ],
        'ci' => 'required',
    ]);

    // Manejo de errores de validación
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Creación y almacenamiento de la reserva en la base de datos
    $reserva = Reserva::create([
        'paquete_id' => $request->paquete_id,
        'nombre' => $request->nombre,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
        'direccion' => $request->direccion,
        'indicaciones' => $request->indicaciones,
        'fecha' => json_encode([$request->fecha]),
        'ci' => $request->ci,
        'estado' => 'Pendiente',
    ]);

    // Actualización de las fechas existentes en la reserva
    $fechasExistentes = $reserva->fecha ? json_decode($reserva->fecha, true) : [];
    $fechasExistentes[] = $request->fecha;
    $reserva->fecha = json_encode($fechasExistentes);

    
    // Validación para deshabilitar fechas con 5 reservas
    if (in_array($request->fecha, $fechasExistentes)) {
        // Verificar si ya hay 5 reservas para esa fecha
        $reservasParaFecha = Reserva::where('fecha', 'like', '%"'.$request->fecha.'"%')->count();
        if ($reservasParaFecha >= 5) {
            return redirect()->back()->withErrors(['fecha' => 'La fecha seleccionada no está disponible.'])->withInput();
        }
    }
    // Obtención del paquete relacionado con la reserva
    $paquete = Paquete::findOrFail($request->paquete_id);

    // Generación del PDF con los detalles de la reserva y el paquete
    $pdf = PDF::loadView('pdf.reserva', compact('reserva', 'paquete'));

    // Almacenamiento del PDF en una ubicación específica
    $pdfPath = storage_path('app/public/reservas/' . $reserva->id . '_reserva.pdf');
    $pdf->save($pdfPath);

    // Redirección a la vista de detalles de la reserva
    return redirect()->route('reservas.show', $reserva->id)->with([
        'success' => 'Reserva exitosa',
        'pdfPath' => $pdfPath,
        
    ]);
}



    
public function descargarPDF($id)
{
    // Obtener la reserva desde la base de datos
    $reserva = Reserva::findOrFail($id);

    // Obtener el paquete relacionado con la reserva
    $paquete = $reserva->paquete;

    // Generar el PDF
    $pdf = PDF::loadView('pdf.reserva', compact('reserva', 'paquete'));

    // Devolver el PDF para su descarga
    return $pdf->download('reserva.pdf');
}


public function destroy($id)
{
    $reserva = Reserva::findOrFail($id);
    $reserva->delete();

    return redirect('inicio')->with('success', 'Reserva eliminada exitosamente.');
}

}
