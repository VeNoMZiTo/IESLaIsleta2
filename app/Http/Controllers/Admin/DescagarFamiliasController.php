<?php

namespace App\Http\Controllers\Admin;

use App\DescagarFamilium;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDescagarFamiliumRequest;
use App\Http\Requests\StoreDescagarFamiliumRequest;
use App\Http\Requests\UpdateDescagarFamiliumRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DescagarFamiliasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('descagar_familium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descagarFamilia = DescagarFamilium::all();

        return view('admin.descagarFamilia.index', compact('descagarFamilia'));
    }

    public function create()
    {
        abort_if(Gate::denies('descagar_familium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descagarFamilia.create');
    }

    public function store(StoreDescagarFamiliumRequest $request)
    {
        $descagarFamilium = DescagarFamilium::create($request->all());

        if ($request->input('archivo', false)) {
            $descagarFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $descagarFamilium->id]);
        }

        return redirect()->route('admin.descagar-familia.index');

    }

    public function edit(DescagarFamilium $descagarFamilium)
    {
        abort_if(Gate::denies('descagar_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descagarFamilia.edit', compact('descagarFamilium'));
    }

    public function update(UpdateDescagarFamiliumRequest $request, DescagarFamilium $descagarFamilium)
    {
        $descagarFamilium->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$descagarFamilium->archivo || $request->input('archivo') !== $descagarFamilium->archivo->file_name) {
                $descagarFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }

        } elseif ($descagarFamilium->archivo) {
            $descagarFamilium->archivo->delete();
        }

        return redirect()->route('admin.descagar-familia.index');

    }

    public function show(DescagarFamilium $descagarFamilium)
    {
        abort_if(Gate::denies('descagar_familium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descagarFamilia.show', compact('descagarFamilium'));
    }

    public function destroy(DescagarFamilium $descagarFamilium)
    {
        abort_if(Gate::denies('descagar_familium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descagarFamilium->delete();

        return back();

    }

    public function massDestroy(MassDestroyDescagarFamiliumRequest $request)
    {
        DescagarFamilium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('descagar_familium_create') && Gate::denies('descagar_familium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DescagarFamilium();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }

}
