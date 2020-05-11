<?php

namespace App\Http\Requests;

use App\JuntaDelegado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateJuntaDelegadoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('junta_delegado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'titulo' => [
                'required'],
        ];
    }
}
