<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donacion';
    protected $primaryKey = 'id_donacion';
    public $timestamps = false;

    protected $casts = [
        'categoria_donacion_id_categoria_donacion' => 'int',
        'metodo_donacion_id_metodo_donacion' => 'int'
    ];

    protected $fillable = [
        'categoria_donacion_id_categoria_donacion',
        'metodo_donacion_id_metodo_donacion'
    ];

    // Relación con Categoría de Donación
    public function categoria_donacion()
    {
        return $this->belongsTo(
            CategoriaDonacion::class,
            'categoria_donacion_id_categoria_donacion',
            'id_categoria_donacion'
        );
    }

    // Relación con Método de Donación
    public function metodo_donacion()
    {
        return $this->belongsTo(
            MetodoDonacion::class,
            'metodo_donacion_id_metodo_donacion',
            'id_metodo_donacion'
        );
    }

    // Relación muchos a muchos con usuarios
    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'usuario_has_donacion',
            'donacion_id_donacion',
            'usuario_id_usuario'
        )->withPivot(
            'usuario_por_donacion',
            'fecha_donacion',
            'estado_donacion',
            'descripcion_donacion',
            'cantidad_donacion'
        );
    }
}