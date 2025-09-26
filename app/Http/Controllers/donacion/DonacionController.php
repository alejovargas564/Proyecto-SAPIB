<?php

namespace App\Http\Controllers\donacion;

use App\Http\Controllers\Controller;
use App\Models\Donacion;
use App\Models\CategoriaDonacion;
use App\Models\MetodoDonacion;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    /**
     * Mostrar listado de donaciones
     */
    public function index()
    {
        // Trae donaciones con relaciones
        $donacion = Donacion::with(['categoria_donacion', 'metodo_donacion'])->get();

        return view('donacion.index', compact('donacion'));
    }

    /**
     * Mostrar formulario para crear una nueva donación
     */
    public function create()
    {
        $categorias = CategoriaDonacion::all();
        $metodos = MetodoDonacion::all();

        return view('donacion.create', compact('categorias', 'metodos'));
    }

    /**
     * Guardar una nueva donación
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria_donacion_id_categoria_donacion' => 'required|exists:categoria_donacion,id_categoria_donacion',
            'metodo_donacion_id_metodo_donacion' => 'required|exists:metodo_donacion,id_metodo_donacion',
        ]);

        Donacion::create($request->all());

        return redirect()->route('donacion.index')->with('success', 'Donación creada correctamente');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Donacion $donacion)
    {
        $categorias = CategoriaDonacion::all();
        $metodos = MetodoDonacion::all();

        return view('donacion.edit', compact('donacion', 'categorias', 'metodos'));
    }

    /**
     * Actualizar donación
     */
    public function update(Request $request, Donacion $donacion)
    {
        $request->validate([
            'categoria_donacion_id_categoria_donacion' => 'required|exists:categoria_donacion,id_categoria_donacion',
            'metodo_donacion_id_metodo_donacion' => 'required|exists:metodo_donacion,id_metodo_donacion',
        ]);

        $donacion->update($request->all());

        return redirect()->route('donacion.index')->with('success', 'Donación actualizada correctamente');
    }

    /**
     * Eliminar donación
     */
    public function destroy(Donacion $donacion)
    {
        $donacion->delete();

        return redirect()->route('donacion.index')->with('success', 'Donación eliminada correctamente');
    }
}