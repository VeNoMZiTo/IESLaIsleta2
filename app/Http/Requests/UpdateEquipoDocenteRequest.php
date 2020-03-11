<?php

namespace App\Http\Requests;

use App\EquipoDocente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEquipoDocenteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipo_docente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'departamento' => [
                'required'],
            'profesores'   => [
                'required'],
            'email'        => [
                'required'],
        ];

    }
}
