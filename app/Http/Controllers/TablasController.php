<?php

namespace App\Http\Controllers;

use App\EquipoDirectivo;
use App\EquipoDocente;
use App\Departamento;
use App\Tutorium;
use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{

    public function getEqDirectivo(){
        $directivo = EquipoDirectivo::all();
        $descargar = Archivo::all()->first()->directiva;
        return view('frontend.eqdirectivo',array(
            'directivo' => $directivo,
            'descargar' => $descargar
        ));
    }
    public function getEqDocente(){
        $docente = EquipoDocente::all();
        $departamentos= Departamento::with('equipoDocentes')->get();
        $descargar = Archivo::all()->first()->docentes;
        return view('frontend.eqdocente',array(
            'docente' => $docente,
            'departamentos' => $departamentos,
            'descargar' => $descargar
        ));
    }
    public function getTutoria(){
        $tutoria = Tutorium::with('departamento')->get();
        $descargar = Archivo::all()->first()->tutoria;
        return view('frontend.tutorias',array(
            'tutoria' => $tutoria,
            'descargar' => $descargar
        ));
    }
}
