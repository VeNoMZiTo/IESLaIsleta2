<?php

namespace App\Http\Controllers;

use App\Calendario;
use App\EquipoDirectivo;
use App\Grupo;
use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Team;
use App\Impreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {
        $Departamento = Team::all();
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
            'noticias'=>$noticias,
            'mierda'=>Grupo::all()

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
        return view('frontend.secretaria.impresos',array(
            'impreso' => $impreso
        ));
    }
    public function getDepartamentos(Request $request){
        $destinatarioConsultas=false;
        switch ($request->path()){
            case 'ampa':
                $url='frontend.familia.ampa';
                break;
            case 'documentos-familias':
                $url='frontend.familia.documentosfamilias';
                break;
            case 'redes-y-proyectos':
                $url='frontend.alumnado.redesyproyectos';
                break;
            case 'nodisponible':
                $url='frontend.nodisponible';
                break;
            case 'profesorado':
                $url='frontend.profesorado.profesorado';
                break;
            case 'certificados':
                $url='frontend.secretaria.certificados';
                break;
            case 'consultas':
                $url='frontend.consultas';
                break;
            case 'junta-de-delegados':
                $url='frontend.alumnado.juntadelegados';
                break;
            case 'oferta-educativa':
                $url='frontend.centro.ofertaeducativa';
                break;
            case 'departamentos':
                $url='frontend.departamentos';
                break;
            case 'pincel-ekade':
                $url='frontend.pincelekade';
                break;
            case 'presentacion':
                $url='frontend.centro.presentacion';
                break;
            case 'consejo-escolar':
                $url='frontend.centro.consejoescolar';
                break;
            case 'cita-previa-tarde':
                $url='frontend.cita.citaprevia';
                break;
            case 'documentos-institucionales':
                $url='frontend.centro.documentos';
                break;
        }
        return view($url,array(
            'destinatarioConsultas' =>$destinatarioConsultas
        ));
    }
    public function getConsultas(Request $request, $id){
        $destinatarioConsultas = $id;
        $email = EquipoDirectivo::all()->where('cargo','=',$id)->first()->email;
        return view('frontend.consultas',array(
            'destinatarioConsultas' => $destinatarioConsultas,
            'email'=>$email
        ));
    }


}
