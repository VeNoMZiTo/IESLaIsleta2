<?php

namespace App\Http\Controllers\Admin;
use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Departamento;
use App\User;
use App\Impreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeUpgradeController
{
    public function index(Request $request)
    {
        $slider = Slider::all();
        $departamentos = Departamento::all();
        $actividades=Actividade::all();
        $noticias = Noticium::all();
        return view('homeUpgrade',array(
            'slider' => $slider,
            'departamentos' => $departamentos,
            'actividades'=> $actividades,
            'noticias'=>$noticias

        ));
    }
}
