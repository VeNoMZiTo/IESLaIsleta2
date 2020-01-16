<?php

namespace App\Http\Requests;

use App\Documento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
