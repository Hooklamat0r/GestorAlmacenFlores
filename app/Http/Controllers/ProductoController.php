<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->paginate(5);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'precio' => 'required|numeric|digits_between:1,6',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $datosProducto = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $datosProducto['imagen'] = $imagenPath;
        }

        Producto::create($datosProducto);

        return redirect()->route('productos.index')->with('success', 'Producto creado.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:30',
            'precio' => 'required|numeric|digits_between:1,6',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto = Producto::findOrFail($id);
        $datosProducto = $request->except('imagen');

        // Si se sube una nueva imagen, eliminamos la anterior
        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $datosProducto['imagen'] = $imagenPath;
        }

        $producto->update($datosProducto);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar la imagen si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
