<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    public $incrementing = false;
    protected $fillable = ['user', 'password', 'nombre', 'apellido', 'perfil_id'];
    public $timestamps = true;

    public function perfil():BelongsTo {
        return $this->belongsTo(Perfil::class, 'perfil_id', 'id');
    }

    public function imagenes():HasMany {
        return $this->hasMany(Imagen::class, 'cuenta_user', 'user');
    }
}


