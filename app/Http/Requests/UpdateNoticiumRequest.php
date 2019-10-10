<?php

namespace App\Http\Requests;

use App\Noticium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateNoticiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('noticium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'titulo'      => [
                'required',
            ],
            'subtitulo'   => [
                'required',
            ],
            'fecha'       => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'autor'       => [
                'required',
            ],
            'descripcion' => [
                'required',
            ],
        ];
    }
}
