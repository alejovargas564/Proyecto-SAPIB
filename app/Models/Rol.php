<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * @property int $usuario_id_usuario
 * 
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $casts = [
		'usuario_id_usuario' => 'int'
	];

	protected $fillable = [
		'nombre_rol',
		'usuario_id_usuario'
	];

	public function usuario()
	{
		return $this->hasOne(Usuario::class, 'id_usuario');
	}
}
