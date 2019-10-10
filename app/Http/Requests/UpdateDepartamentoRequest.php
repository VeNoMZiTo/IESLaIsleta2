<?php

namespace App\Http\Requests;

use App\Departamento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDepartamentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('departamento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required',
            ],
        ];
    }
}
