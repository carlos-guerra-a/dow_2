<?php

namespace App\Models;
use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfiles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function cuentas():HasMany{
        return $this->hasMany(Cuenta::class, 'perfil_id');
    }

    public function eliminarCuenta(Cuenta $cuenta)
    {
        $cuenta->delete();
    }
    



}






