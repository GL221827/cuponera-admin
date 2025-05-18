<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    
    protected $table = 'tipo_usuarios';
    protected $primaryKey = 'id_tipo_usuario';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'id_tipo_usuario' => 'int'
    ];

    protected $fillable = [
        'tipo_usuario'
    ];

    // Relación con los usuarios
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_tipo_usuario');
    }
}
