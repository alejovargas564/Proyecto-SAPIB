<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoriaDonacion extends Model
{
    protected $table = 'categoria_donacion';
    protected $primaryKey = 'id_categoria_donacion';
    public $timestamps = false;

    protected $fillable = [
        'nombre_categoria'
    ];

    // Relación con Donación
    public function donaciones()
    {
        return $this->hasMany(
            Donacion::class,
            'categoria_donacion_id_categoria_donacion',
            'id_categoria_donacion'
        );
    }
}