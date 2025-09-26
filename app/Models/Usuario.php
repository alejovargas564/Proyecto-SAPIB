<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $nombre_usuario
 * @property string $telefono_usuario
 * @property string $correo_usuario
 * @property Carbon $create_at
 * @property int $estado_usuario
 * @property string $contraseña_usuario
 * @property Carbon $upload_at
 * @property string|null $numero_documento
 * @property string|null $tipo_documento
 * 
 * @property Rol $rol
 * @property Collection|EventoPorTaller[] $evento_por_tallers
 * @property Collection|Rol[] $rols
 * @property Collection|Donacion[] $donacions
 * @property Collection|UsuarioVisitum[] $usuario_visita
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	public $timestamps = false;

	protected $casts = [
		'create_at' => 'datetime',
		'estado_usuario' => 'int',
		'upload_at' => 'datetime'
	];

	protected $fillable = [
		'nombre_usuario',
		'telefono_usuario',
		'correo_usuario',
		'create_at',
		'estado_usuario',
		'contraseña_usuario',
		'upload_at',
		'numero_documento',
		'tipo_documento'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_usuario');
	}

	public function evento_por_tallers()
	{
		return $this->hasMany(EventoPorTaller::class, 'usuario_id_usuario');
	}

	public function rols()
	{
		return $this->hasMany(Rol::class, 'usuario_id_usuario');
	}

	public function donacions()
	{
		return $this->belongsToMany(Donacion::class, 'usuario_has_donacion', 'usuario_id_usuario', 'donacion_id_donacion')
					->withPivot('usuario_por_donacion', 'fecha_donacion', 'estado_donacion', 'descripcion_donacion', 'cantidad_donacion');
	}

	public function usuario_visita()
	{
		return $this->hasMany(UsuarioVisitum::class, 'usuario_id_usuario');
	}
}
