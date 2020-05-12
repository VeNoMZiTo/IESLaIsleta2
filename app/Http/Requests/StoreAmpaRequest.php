<?php

namespace App\Http\Requests;

use App\Ampa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAmpaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ampa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'titulo' => [
                'required'],
        ];
    }
}
