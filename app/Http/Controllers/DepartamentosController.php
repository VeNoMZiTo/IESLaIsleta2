<?php

namespace App\Http\Controllers;

use App\Team;
use App\Grupo;
use App\ArchivosGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentosController extends Controller
{
    public function __construct()
    {
        $Departamento = Team::all();
        view()->share('DepartamentosGeneral',$Departamento);
    }

    public function getDepartamento(Request $request, $id)
    {
        if(empty(ArchivosGrupo::with('grupo')->get()->where('team_id','=',Team::all()->where('name','=', $id)->first()->id)->first())){
            $desactivado = true;
        }else{
            $desactivado = false;
        }
        return view('frontend.departamentos.departamentos',array(
            'url'=>$id,
            'desactivado'=>$desactivado
        ));
    }
    public function getCursos(Request $request, $id)
    {
//        $grupos = Grupo::all()->where('team_id','=',Team::all()->where('name','=',$id)->first()->id);
        $Archivos = ArchivosGrupo::with('grupo')->get()->where('team_id','=',Team::all()->where('name','=',$id)->first()->id);
        return view('frontend.departamentos.departamentosrecursos',array(
            'grupos'=>$Archivos,
        ));
    }
    public function getRecurso(Request $request)
    {
        try{
            $Archivos = ArchivosGrupo::with('grupo')->get()->where('team_id','=',$request->input('departamento'))->where('grupo_id','=',$request->input('grupo'))->first();
            return $Archivos;
        }catch(\Exception $e){
            return 'FAIL';
        }
    }
}
