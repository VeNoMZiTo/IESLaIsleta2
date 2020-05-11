<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImpresoRequest;
use App\Http\Requests\StoreImpresoRequest;
use App\Http\Requests\UpdateImpresoRequest;
use App\Impreso;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ImpresosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('impreso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impresos = Impreso::all();

        return view('admin.impresos.index', compact('impresos'));
    }

    public function create()
    {
        abort_if(Gate::denies('impreso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.create');
    }

    public function store(StoreImpresoRequest $request)
    {
        $impreso = Impreso::create($request->all());

        if ($request->input('archivo', false)) {
            $impreso->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $impreso->id]);
        }

        return redirect()->route('admin.impresos.index');
    }

    public function edit(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.edit', compact('impreso'));
    }

    public function update(UpdateImpresoRequest $request, Impreso $impreso)
    {
        $impreso->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$impreso->archivo || $request->input('archivo') !== $impreso->archivo->file_name) {
                $impreso->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }
        } elseif ($impreso->archivo) {
            $impreso->archivo->delete();
        }

        return redirect()->route('admin.impresos.index');
    }

    public function show(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.show', compact('impreso'));
    }

    public function destroy(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impreso->delete();

        return back();
    }

    public function massDestroy(MassDestroyImpresoRequest $request)
    {
        Impreso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('impreso_create') && Gate::denies('impreso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Impreso();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
