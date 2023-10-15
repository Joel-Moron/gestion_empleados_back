<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'personal';
    protected $fillable = [
        'nombre',
        'ap_pa',
        'ap_ma',
        'dni',
        'correo',
        'f_nac',
        'tipo_personal_id'
    ];
}
