<?php

namespace App\Http\Requests;

use App\DocumentosInstitucionale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDocumentosInstitucionaleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documentos_institucionale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre'  => [
                'required'],
            'archivo' => [
                'required'],
        ];
    }
}
