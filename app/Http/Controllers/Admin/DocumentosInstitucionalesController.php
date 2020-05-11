<?php

namespace App\Http\Controllers\Admin;

use App\DocumentosInstitucionale;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentosInstitucionaleRequest;
use App\Http\Requests\StoreDocumentosInstitucionaleRequest;
use App\Http\Requests\UpdateDocumentosInstitucionaleRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentosInstitucionalesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('documentos_institucionale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosInstitucionales = DocumentosInstitucionale::all();

        return view('admin.documentosInstitucionales.index', compact('documentosInstitucionales'));
    }

    public function create()
    {
        abort_if(Gate::denies('documentos_institucionale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosInstitucionales.create');
    }

    public function store(StoreDocumentosInstitucionaleRequest $request)
    {
        $documentosInstitucionale = DocumentosInstitucionale::create($request->all());

        if ($request->input('archivo', false)) {
            $documentosInstitucionale->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentosInstitucionale->id]);
        }

        return redirect()->route('admin.documentos-institucionales.index');
    }

    public function edit(DocumentosInstitucionale $documentosInstitucionale)
    {
        abort_if(Gate::denies('documentos_institucionale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosInstitucionales.edit', compact('documentosInstitucionale'));
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

        return redirect()->route('admin.documentos-institucionales.index');
    }

    public function show(DocumentosInstitucionale $documentosInstitucionale)
    {
        abort_if(Gate::denies('documentos_institucionale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosInstitucionales.show', compact('documentosInstitucionale'));
    }

    public function destroy(DocumentosInstitucionale $documentosInstitucionale)
    {
        abort_if(Gate::denies('documentos_institucionale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosInstitucionale->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentosInstitucionaleRequest $request)
    {
        DocumentosInstitucionale::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('documentos_institucionale_create') && Gate::denies('documentos_institucionale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentosInstitucionale();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
