<?php

namespace App\Http\Requests;

use App\CitaPrevium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCitaPreviumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cita_previum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cita_previa,id',
        ];
    }
}
