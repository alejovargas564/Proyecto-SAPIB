<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Donacion;

/**
 * Class UsuarioHasDonacion
 * 
 * @property int $usuario_por_donacion
 * @property int $usuario_id_usuario
 * @property int $donacion_id_donacion
 * @property Carbon $fecha_donacion
 * @property int $estado_donacion
 * @property string|null $descripcion_donacion
 * @property string|null $cantidad_donacion
 * 
 * @property User $user
 * @property Donacion $donacion
 */
class UsuarioHasDonacion extends Model
{
    // Nombre de la tabla
    protected $table = 'usuario_has_donacion';

    // Clave primaria
    protected $primaryKey = 'usuario_por_donacion';

    // La tabla no tiene timestamps (created_at / updated_at)
    public $timestamps = false;

    // Casts automáticos de tipos de datos
    protected $casts = [
        'usuario_id_usuario' => 'int',
        'donacion_id_donacion' => 'int',
        'fecha_donacion' => 'datetime',
        'estado_donacion' => 'int'
    ];

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'usuario_id_usuario',
        'donacion_id_donacion',
        'fecha_donacion',
        'estado_donacion',
        'descripcion_donacion',
        'cantidad_donacion'
    ];

    // 🔹 Relación con la tabla `users` de Laravel
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id_usuario', 'id');
    }

    // 🔹 Relación con la tabla donaciones
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'donacion_id_donacion', 'id_donacion');
    }
}