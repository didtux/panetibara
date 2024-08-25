<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        // Valida los datos ingresados
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Almacenamiento de la imagen
        $fotoPath = $request->file('foto')->store('productos', 'public');

        // Crear el producto
        Producto::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Valida los datos ingresados
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        // Actualiza el producto
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
