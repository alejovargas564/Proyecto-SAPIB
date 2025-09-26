<?php

namespace App\Http\Controllers\CategoriaTaller;

use App\Http\Controllers\Controller;
use App\Models\CategoriaTaller;
use Illuminate\Http\Request;

class CategoriaTallerController extends Controller
{
    public function index()
    {
        $categorias = CategoriaTaller::all();
        return view('categoriataller.index', compact('categorias'));
    }

    public function create()
    {
        return view('categoriataller.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        CategoriaTaller::create([
            'nombre_categoria' => $request->nombre_categoria,
        ]);

        return redirect()->route('categoriataller.index')->with('ok', 'Categoría creada correctamente');
    }

    public function edit(CategoriaTaller $categoriataller)
    {
        return view('categoriataller.edit', compact('categoriataller'));
    }

    public function update(Request $request, CategoriaTaller $categoriataller)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        $categoriataller->update([
            'nombre_categoria' => $request->nombre_categoria,
        ]);

        return redirect()->route('categoriataller.index')->with('ok', 'Categoría actualizada correctamente');
    }

    public function destroy(CategoriaTaller $categoriataller)
    {
        $categoriataller->delete();
        return redirect()->route('categoriataller.index')->with('ok', 'Categoría eliminada correctamente');
    }
}