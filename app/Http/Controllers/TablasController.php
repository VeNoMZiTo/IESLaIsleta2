<?php

namespace App\Http\Controllers;

use App\EquipoDirectivo;
use App\EquipoDocente;
use App\Departamento;
use App\Tutorium;
use App\Descargar;
use App\Calendario;
use App\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{

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
    public function getHorario(){
        $horario = Horario::all();
        $departamentos = Departamento::all();
        return view('frontend.horariodegrupos',array(
            'horario' => $horario,
            'departamentos' => $departamentos
        ));
    }
}
