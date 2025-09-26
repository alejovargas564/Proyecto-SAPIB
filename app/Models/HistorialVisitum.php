<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialVisitum
 * 
 * @property int $id_historial_visita
 * @property int $visita_id_visita
 * 
 * @property Visitum|null $visitum
 *
 * @package App\Models
 */
class HistorialVisitum extends Model
{
	protected $table = 'historial_visita';
	protected $primaryKey = 'id_historial_visita';
	public $timestamps = false;

	protected $casts = [
		'visita_id_visita' => 'int'
	];

	protected $fillable = [
		'visita_id_visita'
	];

	public function visitum()
	{
		return $this->hasOne(Visitum::class, 'id_visita');
	}
}
