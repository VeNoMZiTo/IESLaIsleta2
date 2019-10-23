<?php

namespace App\Http\Controllers;

use App\EquipoDirectivo;
use App\EquipoDocente;
use App\Departamento;
use App\Tutorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablasController extends Controller
{

    public function getEqDirectivo(){
        $directivo = EquipoDirectivo::all();
        return view('frontend.eqdirectivo',array(
            'directivo' => $directivo
        ));
    }
    public function getEqDocente(){
        $docente = EquipoDocente::all();
        $departamentos= Departamento::with('equipoDocentes')->get();
        return view('frontend.eqdocente',array(
            'docente' => $docente,
            'departamentos' => $departamentos
        ));
    }
}
