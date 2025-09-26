<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioVisitum
 * 
 * @property int $usuario_id_usuario
 * @property int $visita_id_visita
 * @property Carbon|null $fecha_visita
 * @property string|null $descripcion_visita
 * 
 * @property Visitum $visitum
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class UsuarioVisitum extends Model
{
	protected $table = 'usuario_visita';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuario_id_usuario' => 'int',
		'visita_id_visita' => 'int',
		'fecha_visita' => 'datetime'
	];

	protected $fillable = [
		'fecha_visita',
		'descripcion_visita'
	];

	public function visitum()
	{
		return $this->belongsTo(Visitum::class, 'visita_id_visita');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id_usuario');
	}
}
