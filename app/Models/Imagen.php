<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['titulo', 'archivo', 'baneada', 'motivo_ban', 'cuenta_user'];
    public $timestamps = false;


    public function cuenta():BelongsTo {

        return $this->belongsTo(Cuenta::class, 'cuenta_user', 'user');
    }


}

