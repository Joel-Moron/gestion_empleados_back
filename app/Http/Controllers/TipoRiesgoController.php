<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoRiesgo;
use Illuminate\Support\Facades\DB;

class TipoRiesgoController extends Controller
{
    public function tipoRiesgoGet(){
        try {
            //$tag = Tag::where('usuario_id', $id)->get();
            $tiporiesgo = TipoRiesgo::All();

            return response()->json(['message' => 'Datos obtenidos', 'data' => $tiporiesgo], 200);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Datos incorrectos', 'errores' => $e], 500);
        }
    
    }
}
