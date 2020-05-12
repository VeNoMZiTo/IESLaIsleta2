<?php

namespace App\Http\Controllers\Admin;

use App\DocumentosFamilium;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentosFamiliumRequest;
use App\Http\Requests\StoreDocumentosFamiliumRequest;
use App\Http\Requests\UpdateDocumentosFamiliumRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentosFamiliasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_familium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosFamilia = DocumentosFamilium::all();

        return view('admin.documentosFamilia.index', compact('documentosFamilia'));
    }

    public function create()
    {
        abort_if(Gate::denies('documentos_familium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosFamilia.create');
    }

    public function store(StoreDocumentosFamiliumRequest $request)
    {
        $documentosFamilium = DocumentosFamilium::create($request->all());

        if ($request->input('archivo', false)) {
            $documentosFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentosFamilium->id]);
        }

        return redirect()->route('admin.documentos-familia.index');
    }

    public function edit(DocumentosFamilium $documentosFamilium)
    {
        abort_if(Gate::denies('documentos_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosFamilia.edit', compact('documentosFamilium'));
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

        return redirect()->route('admin.documentos-familia.index');
    }

    public function show(DocumentosFamilium $documentosFamilium)
    {
        abort_if(Gate::denies('documentos_familium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosFamilia.show', compact('documentosFamilium'));
    }

    public function destroy(DocumentosFamilium $documentosFamilium)
    {
        abort_if(Gate::denies('documentos_familium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosFamilium->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentosFamiliumRequest $request)
    {
        DocumentosFamilium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documentos_familium_create') && Gate::denies('documentos_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentosFamilium();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
