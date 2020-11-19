<?php

namespace App\Http\Controllers;

use App\Calendario;
use App\ConsejoEscolar;
use App\EquipoDirectivo;
use App\Grupo;
use App\Noticium;
use App\Slider;
use App\Actividade;
use App\Team;
use App\Impreso;
use App\Proyecto;
use App\JuntaDelegado;
use App\DocumentosFamilium;
use App\DocumentosInstitucionale;
use App\Ampa;
use App\SecretariaInformacion;
use App\ActividadesExtraescolare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {
        $Departamento = Team::all();
        view()->share('DepartamentosGeneral',$Departamento);
    }
    public function getIndex(){
        $slider     = Slider::all();
        $actividades= Actividade::all()->take(5);
        $noticias   = Noticium::orderBy('id', 'desc')->take(8)->get();
        return view('frontend.index',array(
            'slider'        => $slider,
            'actividades'   => $actividades,
            'noticias'      =>$noticias,
        ));
    }
    public function getNoticia(Request $request, $id, $noticias){
        $noticia = Noticium::where('id',$id)->first();
        return view('frontend.unoticias',array(
            'articulo' => $noticia
        ));
    }
    public function getActividad(Request $request, $id){
        $actividad = Actividade::where('id',$id)->first();
        return view('frontend.unoticias',array(
            'articulo' => $actividad
        ));
    }
    public function getRepertorioNoticias(){
        $noticias = Noticium::orderBy('id', 'DESC')->get();
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
            case 'cita-previa-tarde':
                $url='frontend.cita.citaprevia';
                break;
        }
        return view($url,array(
            'destinatarioConsultas' =>$destinatarioConsultas
        ));
    }
    public function getConsejoEscolar(){
        $consejoEscolar = ConsejoEscolar::all()->first();
        return view('frontend.centro.consejoescolar',array(
            'consejoEscolar' => $consejoEscolar
        ));
    }
    public function getRedesProyectos(){
        $redesProyectos = Proyecto::all();
        return view('frontend.alumnado.redesyproyectos',array(
            'redesProyectos' => $redesProyectos
        ));
    }
    public function getJuntaDelegados(){
        $juntaDelegados = JuntaDelegado::all()->first();
        return view('frontend.alumnado.juntadelegados',array(
            'juntaDelegados' => $juntaDelegados
        ));
    }
    public function getDocumentosFamilia(){
        $documentosFamilia = DocumentosFamilium::all();
        return view('frontend.familia.documentosfamilias',array(
            'documentosFamilia' => $documentosFamilia
        ));
    }
    public function getDocumentosInstitucionales(){
        $documentosInstitucionales = DocumentosInstitucionale::all();
        return view('frontend.centro.documentos',array(
            'documentosInstitucionales' => $documentosInstitucionales
        ));
    }
    public function getAmpa(){
        $ampa = Ampa::all()->first();
        return view('frontend.familia.ampa',array(
            'ampa' => $ampa
        ));
    }
    public function getSecretariaInformacion(){
        $secretaria = SecretariaInformacion::all()->first();
        return view('frontend.secretaria.informacion',array(
            'secretaria' => $secretaria
        ));
    }
    public function getActividadesExtraescolares(){
        $actividades = ActividadesExtraescolare::all()->first();
        return view('frontend.alumnado.actividadesextraescolares',array(
            'actividades' => $actividades
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
