<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DocumentosInstitucionale;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentosInstitucionaleRequest;
use App\Http\Requests\UpdateDocumentosInstitucionaleRequest;
use App\Http\Resources\Admin\DocumentosInstitucionaleResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosInstitucionalesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_institucionale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosInstitucionaleResource(DocumentosInstitucionale::all());
    }

    public function store(StoreDocumentosInstitucionaleRequest $request)
    {
        $documentosInstitucionale = DocumentosInstitucionale::create($request->all());

        if ($request->input('archivo', false)) {
            $documentosInstitucionale->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        return (new DocumentosInstitucionaleResource($documentosInstitucionale))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentosInstitucionale $documentosInstitucionale)
    {
        abort_if(Gate::denies('documentos_institucionale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosInstitucionaleResource($documentosInstitucionale);
    }

    public function update(UpdateDocumentosInstitucionaleRequest $request, DocumentosInstitucionale $documentosInstitucionale)
    {
        $documentosInstitucionale->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$documentosInstitucionale->archivo || $request->input('archivo') !== $documentosInstitucionale->archivo->file_name) {
                $documentosInstitucionale->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }
        } elseif ($documentosInstitucionale->archivo) {
            $documentosInstitucionale->archivo->delete();
        }

        return (new DocumentosInstitucionaleResource($documentosInstitucionale))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentosInstitucionale $documentosInstitucionale)
    {
        abort_if(Gate::denies('documentos_institucionale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosInstitucionale->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
