<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Documento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Http\Resources\Admin\DocumentoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentoResource(Documento::all());
    }

    public function store(StoreDocumentoRequest $request)
    {
        $documento = Documento::create($request->all());

        if ($request->input('archivo', false)) {
            $documento->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        return (new DocumentoResource($documento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Documento $documento)
    {
        abort_if(Gate::denies('documento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocumentoResource($documento);
    }

    public function update(UpdateDocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$documento->archivo || $request->input('archivo') !== $documento->archivo->file_name) {
                $documento->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }
        } elseif ($documento->archivo) {
            $documento->archivo->delete();
        }

        return (new DocumentoResource($documento))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Documento $documento)
    {
        abort_if(Gate::denies('documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documento->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
