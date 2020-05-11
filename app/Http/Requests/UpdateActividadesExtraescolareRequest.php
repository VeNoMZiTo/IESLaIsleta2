<?php

namespace App\Http\Requests;

use App\ActividadesExtraescolare;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateActividadesExtraescolareRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actividades_extraescolare_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
