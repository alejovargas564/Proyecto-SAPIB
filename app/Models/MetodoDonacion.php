<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MetodoDonacion extends Model
{
    protected $table = 'metodo_donacion';
    protected $primaryKey = 'id_metodo_donacion';
    public $timestamps = false;

    protected $fillable = [
        'nombre_metodo_donacion'
    ];

    // Relación con Donación
    public function donaciones()
    {
        return $this->hasMany(
            Donacion::class,
            'metodo_donacion_id_metodo_donacion',
            'id_metodo_donacion'
        );
    }
}