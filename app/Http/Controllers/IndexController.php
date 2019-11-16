<?php

namespace App\Http\Controllers;

use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Departamento;
use App\Impreso;
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
        $departamentos = Departamento::all();
        return view('frontend.unoticias',array(
            'noticia' => $noticia,
            'departamentos' => $departamentos
        ));
    }
    public function getActividad(Request $request, $id){
        $actividad = Actividade::find($id);
        $departamentos = Departamento::all();
        return view('frontend.unoticias',array(
            'actividad' => $actividad,
            'departamentos' => $departamentos

        ));
    }
    public function getRepertorioNoticias(){
        $noticias = Noticium::all();
        $departamentos = Departamento::all();
        return view('frontend.noticias',array(
            'noticias' => $noticias,
            'departamentos' => $departamentos

        ));
    }
    public function getImpreso(){
        $impreso = Impreso::all();
        $departamentos = Departamento::all();
        return view('frontend.impresos',array(
            'impreso' => $impreso,
            'departamentos' => $departamentos

        ));
    }
    public function getDepartamentos(Request $request){
        $departamentos = Departamento::all();
        $destinatarioConsultas=false;
        switch ($request->path()){
            case 'nodisponible':
                $url='frontend.nodisponible';
                break;
            case 'profesorado':
                $url='frontend.profesorado';
                break;
            case 'certificados':
                $url='frontend.certificados';
                break;
            case 'consultas':
                $url='frontend.consultas';
                break;
            case 'junta-de-delegados':
                $url='frontend.juntadelegados';
                break;
            case 'calendario-escolar':
                $url='frontend.calendarioescolar';
                break;
            case 'oferta-educativa':
                $url='frontend.ofertaeducativa';
                break;
            case 'departamentos':
                $url='frontend.departamentos';
                break;
            case 'pincel-ekade':
                $url='frontend.pincelekade';
                break;
        }
        return view($url,array(
            'departamentos' => $departamentos,
            'destinatarioConsultas' =>$destinatarioConsultas

        ));
    }

    public function getConsultas(Request $request, $id){
        $departamentos = Departamento::all();
        $destinatarioConsultas = $id;
        return view('frontend.consultas',array(
            'departamentos' => $departamentos,
            'destinatarioConsultas' => $destinatarioConsultas

        ));
    }

}
