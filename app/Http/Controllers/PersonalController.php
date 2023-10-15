<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipoPersonal;
use App\Models\Personal;
use Illuminate\Validation\ValidationException;

class PersonalController extends Controller
{
    public function personalGet(){
        try {
            //$tag = Tag::where('usuario_id', $id)->get();
            $personalData = DB::table('personal')
            ->join('tipo_personal', 'personal.tipo_personal_id', '=', 'tipo_personal.id')
            ->join('tipo_riesgo', 'tipo_personal.tipo_riesgo_id', '=', 'tipo_riesgo.id')
            ->select('personal.*', 'tipo_personal.nombre as tipo_personal', 'tipo_riesgo.nombre as tipo_riesgo')
            ->get();



            return response()->json(['message' => 'Datos obtenidos', 'data' => $personalData], 200);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Datos incorrectos', 'errores' => $e], 500);
        }
    
    }
    public function personalCreate(Request $request){
        try {
            
            $request->validate([
                'nombre' => 'required',
                'ap_pa' => 'required',
                'ap_ma' => 'required',
                'dni' => 'required',
                'correo' => 'required',
                'f_nac' => 'required',
                'tipo_personal_id' => 'required',
            ]);

            $tipoPersonal = TipoPersonal::where('id', $request->tipo_personal_id)->first();
            if (!$tipoPersonal) return response()->json(['message' => 'Error no esiste el tipoPersonal'], 400);
    
            $personal = Personal::create([
                'nombre' => $request->nombre,
                'ap_pa' => $request->ap_pa,
                'ap_ma' => $request->ap_ma,
                'dni' => $request->dni,
                'correo' => $request->correo,
                'f_nac' => $request->f_nac,
                'tipo_personal_id' => $request->tipo_personal_id,
            ]);

            return response()->json(['message' => 'personal creado', 'data' => $personal], 200);

        }catch (ValidationException $e){
            return response()->json(['message' => 'Datos incorrectos', 'errores'=>$e->errors()], 400);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }
    }

    public function personalDelete($id){
        try {
            $personal = Personal::where('id', $id)->first();

            if (!$personal) return response()->json(['message' => 'Error no esiste el Personal'], 400);
    
            $personal->delete();
    
            return response()->json(['message' => 'Personal eliminado', 'data' => $personal], 200);

        }  catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }


    }
    public function personalUpdate(Request $request, $id){
        try {
            $personal = Personal::where('id', $id)->first();
            if (!$personal) return response()->json(['message' => 'Error no esiste el personal'], 400);

            $request->validate([
                'nombre' => 'required',
                'ap_pa' => 'required',
                'ap_ma' => 'required',
                'dni' => 'required',
                'correo' => 'required',
                'f_nac' => 'required',
                'tipo_personal_id' => 'required',
            ]);

            $tipoPersonal = TipoPersonal::where('id', $request->tipo_personal_id)->first();
            if (!$tipoPersonal) return response()->json(['message' => 'Error no esiste el tipoRiesgo'], 400);

            $personal -> update([
                'nombre' => $request->nombre,
                'ap_pa' => $request->ap_pa,
                'ap_ma' => $request->ap_ma,
                'dni' => $request->dni,
                'correo' => $request->correo,
                'f_nac' => $request->f_nac,
                'tipo_personal_id' => $request->tipo_personal_id,
            ]);

            return response()->json(['message' => 'personal editado', 'data' => $personal], 200);

        }catch (ValidationException $e){
            return response()->json(['message' => 'Datos incorrectos', 'errores'=>$e->errors()], 400);
        } catch (\Eception $e) {
            return response()->json(['message' => 'Error de servidor', 'errores' => $e], 500);
        }
    }
}
