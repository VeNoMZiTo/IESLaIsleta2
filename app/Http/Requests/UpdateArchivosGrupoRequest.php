<?php

namespace App\Http\Requests;

use App\ArchivosGrupo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateArchivosGrupoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('archivos_grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'grupo_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
