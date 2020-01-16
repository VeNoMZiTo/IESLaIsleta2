<?php

namespace App\Http\Requests;

use App\Documento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre'    => [
                'required',
            ],
            'archivo.*' => [
                'required',
            ],
        ];
    }
}
