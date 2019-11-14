<?php

namespace App\Http\Requests;

use App\Calendario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCalendarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('calendario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:calendarios,id',
        ];
    }
}
