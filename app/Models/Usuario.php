<?php
/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

class Usuario extends Authenticatable
{
    use  Notifiable;

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

     protected $attributes = [
        'apellido' => '',
        'telefono' => '',
        'direccion' => '',
        'DUI' => '',
        'codigo_verificacion' => null,
        'verificado' => false
    ];

     public function getAuthIdentifierName()
	  {
		  return 'correo';
	  }


    // metodo para conseguir la contraseña
    public function getAuthPassword()
    {
        return $this->contra;
    }

    // relacion con tipo de usuario
    public function tipo()
    {
        return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
    }
}

