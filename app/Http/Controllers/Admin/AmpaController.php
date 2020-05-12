<?php

namespace App\Http\Controllers\Admin;

use App\Ampa;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAmpaRequest;
use App\Http\Requests\StoreAmpaRequest;
use App\Http\Requests\UpdateAmpaRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AmpaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ampa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ampas = Ampa::all();

        return view('admin.ampas.index', compact('ampas'));
    }

    public function create()
    {
        abort_if(Gate::denies('ampa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.create');
    }

    public function store(StoreAmpaRequest $request)
    {
        $ampa = Ampa::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ampa->id]);
        }

        return redirect()->route('admin.ampas.index');
    }

    public function edit(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.edit', compact('ampa'));
    }

    public function update(UpdateAmpaRequest $request, Ampa $ampa)
    {
        $ampa->update($request->all());

        return redirect()->route('admin.ampas.index');
    }

    public function show(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.show', compact('ampa'));
    }

    public function destroy(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ampa->delete();

        return back();
    }

    public function massDestroy(MassDestroyAmpaRequest $request)
    {
        Ampa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ampa_create') && Gate::denies('ampa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ampa();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
