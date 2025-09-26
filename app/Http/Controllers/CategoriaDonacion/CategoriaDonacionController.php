<?php

namespace App\Http\Controllers\CategoriaDonacion;

use App\Http\Controllers\Controller;
use App\Models\CategoriaDonacion;
use Illuminate\Http\Request;

class CategoriaDonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = CategoriaDonacion::all();
        return view('categoriadonacion.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoriadonacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        CategoriaDonacion::create([
            'nombre_categoria' => $request->nombre_categoria,
        ]);

        return redirect()->route('categoriadonacion.index')->with('ok', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaDonacion $categoriaDonacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaDonacion $categoriadonacion)
{
    return view('categoriadonacion.edit', [
        'categoriaDonacion' => $categoriadonacion
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaDonacion $categoriadonacion)
{
    $request->validate([
        'nombre_categoria' => 'required|string|max:255',
    ]);

    $categoriadonacion->update([
        'nombre_categoria' => $request->nombre_categoria,
    ]);

    return redirect()->route('categoriadonacion.index')->with('ok', 'Categoría actualizada correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaDonacion $categoriadonacion)
    {
        $categoriadonacion->delete();
        return redirect()->route('categoriadonacion.index')->with('ok', 'Categoría eliminada correctamente');
    }
}
