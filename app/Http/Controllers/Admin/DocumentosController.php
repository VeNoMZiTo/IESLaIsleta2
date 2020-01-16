<?php

namespace App\Http\Controllers\Admin;

use App\Documento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentoRequest;
use App\Http\Requests\StoreDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentos = Documento::all();

        return view('admin.documentos.index', compact('documentos'));
    }

    public function create()
    {
        abort_if(Gate::denies('documento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentos.create');
    }

    public function store(StoreDocumentoRequest $request)
    {
        $documento = Documento::create($request->all());

        foreach ($request->input('archivo', []) as $file) {
            $documento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivo');
        }

        return redirect()->route('admin.documentos.index');
    }

    public function edit(Documento $documento)
    {
        abort_if(Gate::denies('documento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentos.edit', compact('documento'));
    }

    public function update(UpdateDocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->all());

        if (count($documento->archivo) > 0) {
            foreach ($documento->archivo as $media) {
                if (!in_array($media->file_name, $request->input('archivo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $documento->archivo->pluck('file_name')->toArray();

        foreach ($request->input('archivo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivo');
            }
        }

        return redirect()->route('admin.documentos.index');
    }

    public function show(Documento $documento)
    {
        abort_if(Gate::denies('documento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentos.show', compact('documento'));
    }

    public function destroy(Documento $documento)
    {
        abort_if(Gate::denies('documento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documento->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentoRequest $request)
    {
        Documento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
