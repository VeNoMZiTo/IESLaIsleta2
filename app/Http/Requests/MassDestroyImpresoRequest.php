<?php

namespace App\Http\Requests;

use App\Impreso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImpresoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('impreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:impresos,id',
        ];
    }
}
