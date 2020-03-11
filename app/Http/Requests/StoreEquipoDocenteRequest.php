<?php

namespace App\Http\Requests;

use App\EquipoDocente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEquipoDocenteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipo_docente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'departamento_id' => [
                'required',
                'integer'],
            'profesores'      => [
                'required'],
            'email'           => [
                'required'],
        ];

    }
}
