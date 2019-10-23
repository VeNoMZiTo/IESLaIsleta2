<?php

namespace App\Http\Requests;

use App\Archivo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreArchivoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('archivo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
