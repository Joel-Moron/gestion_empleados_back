<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRiesgo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tipo_riesgo';
    protected $fillable = [
        'nombre',
        'color'
    ];
}
