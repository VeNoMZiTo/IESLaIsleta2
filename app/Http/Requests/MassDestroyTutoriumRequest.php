<?php

namespace App\Http\Requests;

use App\Tutorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTutoriumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tutorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tutoria,id',
        ];

    }
}
