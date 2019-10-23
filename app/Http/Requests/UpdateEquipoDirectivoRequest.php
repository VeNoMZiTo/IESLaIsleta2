<?php

namespace App\Http\Requests;

use App\EquipoDirectivo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEquipoDirectivoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipo_directivo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cargo'        => [
                'required',
            ],
            'nombre'       => [
                'required',
            ],
            'departamento' => [
                'required',
            ],
            'email'        => [
                'required',
            ],
        ];
    }
}
