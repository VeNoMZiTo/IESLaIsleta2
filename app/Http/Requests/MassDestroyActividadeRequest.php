<?php

namespace App\Http\Requests;

use App\Actividade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActividadeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actividade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actividades,id',
        ];

    }
}
