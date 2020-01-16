<?php

namespace App\Http\Controllers;

use App\Calendario;
use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Departamento;
use App\Impreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
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
    public function getIndex(){
        $slider = Slider::all();
        $actividades=Actividade::all()->take(4);
        $noticias = Noticium::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.index',array(
            'slider' => $slider,
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
    public function getImpreso(){
        $impreso = Impreso::all();
        return view('frontend.impresos',array(
            'impreso' => $impreso
        ));
    }
    public function getDepartamentos(Request $request){
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
            case 'oferta-educativa':
                $url='frontend.ofertaeducativa';
                break;
            case 'departamentos':
                $url='frontend.departamentos';
                break;
            case 'pincel-ekade':
                $url='frontend.pincelekade';
                break;
            case 'presentacion':
                $url='frontend.presentacion';
                break;
            case 'consejo-escolar':
                $url='frontend.consejoescolar';
                break;
        }
        return view($url,array(
            'destinatarioConsultas' =>$destinatarioConsultas
        ));
    }
    public function getConsultas(Request $request, $id){
        $destinatarioConsultas = $id;
        return view('frontend.consultas',array(
            'destinatarioConsultas' => $destinatarioConsultas

        ));
    }


}
