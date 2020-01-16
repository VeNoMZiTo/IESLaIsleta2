<?php

namespace App\Http\Requests;

use App\Asginatura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAsginaturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asginatura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre'   => [
                'required',
            ],
            'cursos.*' => [
                'integer',
            ],
            'cursos'   => [
                'required',
                'array',
            ],
        ];
    }
}
