<?php

namespace App\Http\Requests;

use App\Descargar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDescargarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('descargar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
        ];

    }
}
