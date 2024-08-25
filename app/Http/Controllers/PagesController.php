<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($page)
    {
        $viewPath = "pages.$page";
        $productos = Producto::all();
        
        if (View::exists($viewPath)) {
            return view($viewPath, compact('productos'));
        } else {
            abort(404); // Devuelve un error 404 si la vista no existe
        }
    }
}