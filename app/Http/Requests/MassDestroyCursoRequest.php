<?php

namespace App\Http\Requests;

use App\Curso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCursoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('curso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cursos,id',
        ];

    }
}
