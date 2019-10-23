<?php

namespace App\Http\Requests;

use App\Tutorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTutoriumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tutorium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nivel'         => [
                'required',
            ],
            'grupo'         => [
                'required',
            ],
            'tutor'         => [
                'required',
            ],
            'departamento'  => [
                'required',
            ],
            'email'         => [
                'required',
            ],
            'hora_atencion' => [
                'required',
            ],
        ];
    }
}
