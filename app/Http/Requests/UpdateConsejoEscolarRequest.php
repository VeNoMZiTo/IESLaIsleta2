<?php

namespace App\Http\Requests;

use App\ConsejoEscolar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateConsejoEscolarRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('consejo_escolar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
