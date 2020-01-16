<?php

namespace App\Http\Controllers;

use App\EquipoDirectivo;
use App\EquipoDocente;
use App\Departamento;
use App\Tutorium;
use App\Descargar;
use App\Calendario;
use App\Horario;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{
    public function __construct()
    {
        $Departamento = Departamento::all();
        if(count($Departamento)%2!=0){
            $contador=count($Departamento) - 1;
        }else{
            $contador= count($Departamento)/2;
        }
        view()->share('DepartamentosGeneral',[
            '0'=>array_slice($Departamento->toArray(),0,$contador),
            '1'=>array_slice($Departamento->toArray(),$contador,count($Departamento)),
        ]);
    }
    public function getEqDirectivo(){
        $directivo = EquipoDirectivo::all();
        $descargar = Descargar::all()->first();
        $departamentos = Departamento::all();
        return view('frontend.eqdirectivo',array(
            'directivo' => $directivo,
            'descargar' => $descargar,
            'departamentos' => $departamentos
        ));
    }
    public function getEqDocente(){
        $docente = EquipoDocente::all();
        $departamentos= Departamento::with('equipoDocentes')->get();
        $descargar = Descargar::all()->first();
        return view('frontend.eqdocente',array(
            'docente' => $docente,
            'departamentos' => $departamentos,
            'descargar' => $descargar
        ));
    }
    public function getTutoria(){
        $tutoria = Tutorium::with('departamento')->get();
        $descargar = Descargar::all()->first();
        $departamentos = Departamento::all();
        return view('frontend.tutorias',array(
            'tutoria' => $tutoria,
            'descargar' => $descargar,
            'departamentos' => $departamentos
        ));
    }
    public function getCalendario(){
        $calendario = Calendario::all();
        $departamentos = Departamento::all();
        return view('frontend.calendarioescolar',array(
            'calendario' => $calendario,
            'departamentos' => $departamentos
        ));
    }
    public function getHorario(Request $request, $id){
        $grupos = Grupo::all();
        $horario = Horario::firstOrFail()->where('curso_id',$id)->get();
        $departamentos = Departamento::all();
        return view('frontend.horariodegrupo',array(
            'grupos' =>$grupos,
            'horario' => $horario,
            'departamentos' => $departamentos
        ));
    }
    public function getGrupo(){
        $grupos = Grupo::all();
        $departamentos = Departamento::all();
        return view('frontend.grupos',array(
            'grupos' =>$grupos,
            'departamentos' => $departamentos
        ));
    }
}
