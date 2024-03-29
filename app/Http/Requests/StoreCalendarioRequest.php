<?php

namespace App\Http\Requests;

use App\Calendario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCalendarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('calendario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tipo'  => [
                'required',
            ],
            'tema'  => [
                'required',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
