<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoPersonal;
use App\Models\TipoRiesgo;
use Illuminate\Validation\ValidationException;

class TipoPersonalController extends Controller
{
    public function tipoPersonalGet(){
        try {
            //$tag = Tag::where('usuario_id', $id)->get();
            $tipoPersonal = TipoPersonal::All();
            $tipoPersonalData = DB::table('tipo_personal')
            ->join('tipo_riesgo', 'tipo_riesgo_id', '=', 'tipo_riesgo.id')
            ->select('tipo_personal.*', 'tipo_riesgo.nombre as tipo_riesgo', 'tipo_riesgo.nombre as tipo_riesgo')
            ->get();

            return response()->json(['message' => 'Datos obtenidos', 'data' => $tipoPersonalData], 200);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Datos incorrectos', 'errores' => $e], 500);
        }
    
    }
    public function tipoPersonalCreate(Request $request){
        try {
            $request->validate([
                'nombre' => 'required',
                'sueldo' => 'required',
                'tipo_riesgo_id' => 'required',
            ]);
    
            $tipoPersonal = TipoPersonal::create([
                'nombre' => $request->nombre,
                'sueldo' => $request->sueldo,
                'tipo_riesgo_id' => $request->tipo_riesgo_id
            ]);

            return response()->json(['message' => 'tipoPersonal creado', 'data' => $tipoPersonal], 200);

        }catch (ValidationException $e){
            return response()->json(['message' => 'Datos incorrectos', 'errores'=>$e->errors()], 400);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }
    }

    public function tipoPersonalDelete($id){
        try {
            $tipoPersonal = TipoPersonal::where('id', $id)->first();

            if (!$tipoPersonal) return response()->json(['message' => 'Error no esiste el tipoPersonal'], 400);
    
            $tipoPersonal->delete();
    
            return response()->json(['message' => 'tipoPersonal eliminado', 'data' => $tipoPersonal], 200);

        }  catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }


    }
    public function tipoPersonalUpdate(Request $request, $id){
        try {
            $tipoPersonal = TipoPersonal::where('id', $id)->first();
            if (!$tipoPersonal) return response()->json(['message' => 'Error no esiste el tipoPersonal'], 400);

            $request->validate([
                'nombre' => 'required',
                'sueldo' => 'required|numeric',
                'tipo_riesgo_id' => 'required|numeric'
            ]);
            
            $tipoRiesgo = TipoRiesgo::where('id', $request->tipo_riesgo_id)->first();
            if (!$tipoRiesgo) return response()->json(['message' => 'Error no esiste el tipoRiesgo'], 400);

    
            $tipoPersonal -> update([
                'nombre' => $request->nombre,
                'sueldo' => $request->sueldo,
                'tipo_riesgo_id' => $request->tipo_riesgo_id
            ]);

            return response()->json(['message' => 'tipoPersonal editado', 'data' => $tipoPersonal], 200);

        }catch (ValidationException $e){
            return response()->json(['message' => 'Datos incorrectos', 'errores'=>$e->errors()], 400);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }
    }
}
