<?php

namespace App\Http\Controllers\usuariohasdonacion;

use App\Http\Controllers\Controller;
use App\Models\UsuarioHasDonacion;
use Illuminate\Http\Request;

class UsuarioHasDonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $usuariohasdonacion = UsuarioHasDonacion::with('user')->get();
    return view('usuariohasdonacion.index', compact('usuariohasdonacion'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuariohasdonacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id_usuario' => 'required|integer',
            'donacion_id_donacion' => 'required|integer',
            'fecha_donacion' => 'required|date',
            'estado_donacion' => 'required|boolean',
            'descripcion_donacion' => 'nullable|string|max:200',
            'cantidad_donacion' => 'nullable|string|max:100',
        ]);

        UsuarioHasDonacion::create($request->all());

        return redirect()->route('usuariohasdonacion.index')
                         ->with('success', 'Donación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuarioHasDonacion $usuarioHasDonacion)
    {
        return view('usuariohasdonacion.show', compact('usuarioHasDonacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $donacion = UsuarioHasDonacion::findOrFail($id);
        return view('usuariohasdonacion.edit', compact('donacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id_usuario' => 'required|integer',
            'donacion_id_donacion' => 'required|integer',
            'fecha_donacion' => 'required|date',
            'estado_donacion' => 'required|boolean',
            'descripcion_donacion' => 'nullable|string|max:200',
            'cantidad_donacion' => 'nullable|string|max:100',
        ]);

        $donacion = UsuarioHasDonacion::findOrFail($id);
        $donacion->update($request->all());

        return redirect()->route('usuariohasdonacion.index')
                         ->with('success', 'Donación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $donacion = UsuarioHasDonacion::findOrFail($id);
        $donacion->delete();

        return redirect()->route('usuariohasdonacion.index')
                         ->with('success', 'Donación eliminada exitosamente.');
    }
}
