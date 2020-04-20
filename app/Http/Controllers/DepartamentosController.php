<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentosController extends Controller
{
    public function __construct()
    {
        $Departamento = Team::all();
        if (count($Departamento) % 2 != 0) {
            $contador = count($Departamento) - 1;
        } else {
            $contador = count($Departamento) / 2;
        }
        view()->share('DepartamentosGeneral', [
            '0' => array_slice($Departamento->toArray(), 0, $contador),
            '1' => array_slice($Departamento->toArray(), $contador, count($Departamento)),
        ]);
    }

    public function getDepartamento(Request $request, $id)
    {

        return view('frontend.departamentos',array(
        ));
    }
}
