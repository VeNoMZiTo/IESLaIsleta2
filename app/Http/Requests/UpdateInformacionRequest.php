<?php

namespace App\Http\Requests;

use App\Informacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInformacionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('informacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'texto' => [
                'required',
            ],
        ];
    }
}
