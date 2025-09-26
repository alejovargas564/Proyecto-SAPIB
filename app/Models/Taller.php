<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taller
 * 
 * @property int $id_taller
 * @property string $Nombre_taller
 * @property int $categoria_taller_id_categoria_taller
 * 
 * @property CategoriaTaller $categoria_taller
 * @property Collection|EventoPorTaller[] $evento_por_tallers
 *
 * @package App\Models
 */
class Taller extends Model
{
	protected $table = 'taller';
	protected $primaryKey = 'id_taller';
	public $timestamps = false;

	protected $casts = [
		'categoria_taller_id_categoria_taller' => 'int'
	];

	protected $fillable = [
		'Nombre_taller',
		'categoria_taller_id_categoria_taller'
	];

	public function categoria_taller()
	{
		return $this->belongsTo(CategoriaTaller::class, 'id_taller');
	}

	public function evento_por_tallers()
	{
		return $this->hasMany(EventoPorTaller::class, 'taller_id_taller');
	}
}
