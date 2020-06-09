<?php

namespace App\Http\Requests;

use App\ArchivosGrupo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyArchivosGrupoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('archivos_grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:archivos_grupos,id',
        ];
    }
}
