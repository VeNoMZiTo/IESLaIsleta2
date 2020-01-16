<?php

namespace App\Http\Requests;

use App\CitaPrevium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCitaPreviumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cita_previum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'asignatura_id' => [
                'required',
                'integer',
            ],
            'curso_id'      => [
                'required',
                'integer',
            ],
            'fecha'         => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
