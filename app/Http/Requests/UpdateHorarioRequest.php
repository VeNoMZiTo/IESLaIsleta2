<?php

namespace App\Http\Requests;

use App\Horario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHorarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'curso_id'   => [
                'required',
                'integer',
            ],
            'horario'    => [
                'required',
            ],
            'dia'        => [
                'required',
            ],
            'asignatura' => [
                'required',
            ],
            'color'      => [
                'required',
            ],
        ];
    }
}
