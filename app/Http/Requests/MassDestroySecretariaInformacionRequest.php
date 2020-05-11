<?php

namespace App\Http\Requests;

use App\SecretariaInformacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySecretariaInformacionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('secretaria_informacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:secretaria_informacions,id',
        ];
    }
}
