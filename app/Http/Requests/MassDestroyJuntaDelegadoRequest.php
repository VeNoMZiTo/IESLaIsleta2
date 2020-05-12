<?php

namespace App\Http\Requests;

use App\JuntaDelegado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJuntaDelegadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('junta_delegado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:junta_delegados,id',
        ];
    }
}
