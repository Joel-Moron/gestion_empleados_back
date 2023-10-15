<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersonal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tipo_personal';
    protected $fillable = [
        'nombre',
        'sueldo',
        'tipo_riesgo_id',
    ];
}
