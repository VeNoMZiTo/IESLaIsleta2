<?php

namespace App\Http\Requests;

use App\EquipoDocente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEquipoDocenteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipo_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:equipo_docentes,id',
        ];

    }
}
