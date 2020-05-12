<?php

namespace App\Http\Requests;

use App\DocumentosFamilium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDocumentosFamiliumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documentos_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required'],
        ];
    }
}
