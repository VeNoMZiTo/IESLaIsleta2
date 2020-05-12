<?php

namespace App\Http\Requests;

use App\Impreso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreImpresoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('impreso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre'  => [
                'required'],
            'archivo' => [
                'required'],
        ];
    }
}
