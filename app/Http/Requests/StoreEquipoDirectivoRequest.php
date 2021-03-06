<?php

namespace App\Http\Requests;

use App\EquipoDirectivo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEquipoDirectivoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('equipo_directivo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'cargo'                    => [
                'required'],
            'nombre'                   => [
                'required'],
            'abreviatura_departamento' => [
                'required'],
            'email'                    => [
                'required'],
        ];

    }
}
