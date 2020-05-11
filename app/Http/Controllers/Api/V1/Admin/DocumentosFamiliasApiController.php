<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DocumentosFamilium;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentosFamiliumRequest;
use App\Http\Requests\UpdateDocumentosFamiliumRequest;
use App\Http\Resources\Admin\DocumentosFamiliumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosFamiliasApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_familium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosFamiliumResource(DocumentosFamilium::all());
    }

    public function store(StoreDocumentosFamiliumRequest $request)
    {
        $documentosFamilium = DocumentosFamilium::create($request->all());

        if ($request->input('archivo', false)) {
            $documentosFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        return (new DocumentosFamiliumResource($documentosFamilium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocumentosFamilium $documentosFamilium)
    {
        abort_if(Gate::denies('documentos_familium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentosFamiliumResource($documentosFamilium);
    }

    public function update(UpdateDocumentosFamiliumRequest $request, DocumentosFamilium $documentosFamilium)
    {
        $documentosFamilium->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$documentosFamilium->archivo || $request->input('archivo') !== $documentosFamilium->archivo->file_name) {
                $documentosFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }
        } elseif ($documentosFamilium->archivo) {
            $documentosFamilium->archivo->delete();
        }

        return (new DocumentosFamiliumResource($documentosFamilium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocumentosFamilium $documentosFamilium)
    {
        abort_if(Gate::denies('documentos_familium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosFamilium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
