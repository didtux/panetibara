<?php

namespace App\Http\Controllers;
use App\Models\Paquete;
use App\Models\Producto;
use App\Models\Reserva;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Si se proporciona un término de búsqueda, filtra los productos.
        if ($query) {
            $productos = Producto::where('nombre', 'like', "%$query%")
                                  ->orWhere('tipo', 'like', "%$query%")
                                  ->orWhere('precio', 'like', "%$query%")
                                  ->get();
        } else {
            // Si no se proporciona un término de búsqueda, carga todos los productos.
            $productos = Producto::all();
        }
     
        
        $paquetes = Paquete::all(); // Obtener todos los paquetes o ajustar la consulta según tus necesidades
        return view('home', compact('paquetes','productos',

        'query'));
    
    }
}
