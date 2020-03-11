<?php

namespace App\Http\Requests;

use App\Asginatura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAsginaturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asginatura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'asginaturas' => [
                'required'],
        ];

    }
}
