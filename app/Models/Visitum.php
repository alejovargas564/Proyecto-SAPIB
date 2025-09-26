<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visitum
 * 
 * @property int $id_visita
 * @property int $estado_visita
 * @property string|null $Descripcion_visita
 * 
 * @property HistorialVisitum $historial_visitum
 * @property Collection|UsuarioVisitum[] $usuario_visita
 *
 * @package App\Models
 */
class Visitum extends Model
{
	protected $table = 'visita';
	protected $primaryKey = 'id_visita';
	public $timestamps = false;

	protected $casts = [
		'estado_visita' => 'int'
	];

	protected $fillable = [
		'estado_visita',
		'Descripcion_visita'
	];

	public function historial_visitum()
	{
		return $this->belongsTo(HistorialVisitum::class, 'id_visita');
	}

	public function usuario_visita()
	{
		return $this->hasMany(UsuarioVisitum::class, 'visita_id_visita');
	}
}
