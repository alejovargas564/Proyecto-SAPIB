<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventoPorTaller
 * 
 * @property int $usuario_id_usuario
 * @property int $taller_id_taller
 * @property string|null $descripcion
 * @property Carbon|null $fecha_taller
 * 
 * @property Taller $taller
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class EventoPorTaller extends Model
{
	protected $table = 'evento_por_taller';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuario_id_usuario' => 'int',
		'taller_id_taller' => 'int',
		'fecha_taller' => 'datetime'
	];

	protected $fillable = [
		'descripcion',
		'fecha_taller'
	];

	public function taller()
	{
		return $this->belongsTo(Taller::class, 'taller_id_taller');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id_usuario');
	}
}
