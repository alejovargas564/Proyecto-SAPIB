<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
 * @property Usuario $usuario
 * @property Donacion $donacion
 *
 * @package App\Models
 */
class UsuarioHasDonacion extends Model
{
	protected $table = 'usuario_has_donacion';
	protected $primaryKey = 'usuario_por_donacion';
	public $timestamps = false;

	protected $casts = [
		'usuario_id_usuario' => 'int',
		'donacion_id_donacion' => 'int',
		'fecha_donacion' => 'datetime',
		'estado_donacion' => 'int'
	];

	protected $fillable = [
		'usuario_id_usuario',
		'donacion_id_donacion',
		'fecha_donacion',
		'estado_donacion',
		'descripcion_donacion',
		'cantidad_donacion'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id_usuario');
	}

	public function donacion()
	{
		return $this->belongsTo(Donacion::class, 'donacion_id_donacion');
	}
}
