<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_Usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $correo
 * @property string $direccion
 * @property string $DUI
 * @property string $contra
 * @property int $id_tipo_usuario
 * @property string|null $codigo_verificacion
 * @property bool|null $verificado
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_Usuario';
	public $timestamps = false;

	protected $casts = [
		'id_tipo_usuario' => 'int',
		'verificado' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'telefono',
		'correo',
		'direccion',
		'DUI',
		'contra',
		'id_tipo_usuario',
		'codigo_verificacion',
		'verificado'
	];
}
