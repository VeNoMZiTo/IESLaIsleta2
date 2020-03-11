<?php

namespace App\Http\Controllers;

use App\EquipoDirectivo;
use App\EquipoDocente;
use App\team;
use App\Tutorium;
use App\Descargar;
use App\DescagarFamilium;
use App\Calendario;
use App\Horario;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{
    public function getEqDirectivo(){
        $directivo = EquipoDirectivo::all();
        $descargar = Descargar::all()->first();
        return view('frontend.eqdirectivo',array(
            'directivo' => $directivo,
            'descargar' => $descargar
        ));
    }
    public function getEqDocente(){
        $docente = EquipoDocente::all();
//        $departamentos= EquipoDocente::with('departamento')->get();
        $descargar = Descargar::all()->first();
        return view('frontend.eqdocente',array(
            'docente' => $docente,
            'descargar' => $descargar
        ));
    }
    public function getTutoria(){
        $tutoria = Tutorium::all();
        $descargar = DescagarFamilium::all()->first();
        return view('frontend.tutorias',array(
            'tutoria' => $tutoria,
            'descargar' => $descargar
        ));
    }
    public function getCalendario(){
        $calendario = Calendario::all()->where('fecha')->sortBy('fecha');
        $descargar = Descargar::all()->first();

        return view('frontend.calendarioescolar',array(
            'calendario' => $calendario,
            'descargar'=>$descargar
        ));
    }
    public function getHorario(Request $request, $id){
        $grupos = Grupo::all();
        $horario = Horario::firstOrFail()->where('curso_id',Grupo::all()->where('curso',$id)->first()->id)->get();
        return view('frontend.horariodegrupo',array(
            'grupos' =>$grupos,
            'horario' => $horario
        ));
    }
//    public function getGrupo(){
//        $grupos = Grupo::all();
//        $departamentos = Departamento::all();
//        return view('frontend.grupos',array(
//            'grupos' =>$grupos,
//            'departamentos' => $departamentos
//        ));
//    }
}
