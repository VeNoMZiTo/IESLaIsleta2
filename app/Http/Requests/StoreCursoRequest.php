<?php

namespace App\Http\Requests;

use App\Curso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCursoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('curso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'nivel'         => [
                'required'],
            'curso'         => [
                'required'],
            'asignatura_id' => [
                'required',
                'integer'],
        ];

    }
}
