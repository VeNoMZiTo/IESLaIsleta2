<?php

namespace App\Http\Requests;

use App\DescagarFamilium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDescagarFamiliumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('descagar_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
        ];

    }
}
