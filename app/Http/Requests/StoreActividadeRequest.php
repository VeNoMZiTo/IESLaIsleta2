<?php

namespace App\Http\Requests;

use App\Actividade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreActividadeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actividade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'titulo'      => [
                'required'],
            'fecha'       => [
                'required',
                'date_format:' . config('panel.date_format')],
            'foto.*'      => [
                'required'],
            'autor'       => [
                'required'],
            'descripcion' => [
                'required'],
        ];

    }
}
