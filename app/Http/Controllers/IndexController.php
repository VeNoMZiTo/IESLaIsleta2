<?php

namespace App\Http\Controllers;

use App\Noticium;
use App\Slider;
use App\Actividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
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

}
