<?php

namespace App\Http\Requests;

use App\Horario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreHorarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('horario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'grupo_id'   => [
                'required',
                'integer'],
            'horario'    => [
                'required'],
            'dia'        => [
                'required'],
            'asignatura' => [
                'required'],
            'color'      => [
                'required'],
        ];

    }
}
