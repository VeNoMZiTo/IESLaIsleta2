<?php

namespace App\Http\Controllers;

use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getIndex(){
        $slider = Slider::all();
        $departamentos = Departamento::all();
        $actividades=Actividade::all()->take(4);
        $noticias = Noticium::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.index',array(
            'slider' => $slider,
            'departamentos' => $departamentos,
            'actividades'=> $actividades,
            'noticias'=>$noticias
        ));
    }
    public function getNoticia(Request $request, $id){
        $noticia = Noticium::find($id);
        return view('frontend.unoticias',array(
            'noticia' => $noticia
        ));
    }
    public function getActividad(Request $request, $id){
        $actividad = Actividade::find($id);
        return view('frontend.unoticias',array(
            'actividad' => $actividad
        ));
    }
    public function getRepertorioNoticias(){
        $noticias = Noticium::all();
        return view('frontend.noticias',array(
            'noticias' => $noticias
        ));
    }

}
