<?php

namespace App\Http\Requests;

use App\Descargar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDescargarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('descargar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:descargars,id',
        ];
    }
}
