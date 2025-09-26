<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaTaller extends Model
{
    // Ajusta el nombre de tabla si en tu BD no se llama 'categoria_taller'
    protected $table = 'categoria_taller';

    protected $primaryKey = 'id_categoria_taller';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // cambia a true si tienes created_at/updated_at

    protected $fillable = [
        'nombre_categoria',
    ];
}