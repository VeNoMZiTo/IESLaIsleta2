<?php

namespace App\Http\Controllers\Admin;

use App\ActividadesExtraescolare;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActividadesExtraescolareRequest;
use App\Http\Requests\StoreActividadesExtraescolareRequest;
use App\Http\Requests\UpdateActividadesExtraescolareRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActividadesExtraescolaresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actividades_extraescolare_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesExtraescolares = ActividadesExtraescolare::all();

        return view('admin.actividadesExtraescolares.index', compact('actividadesExtraescolares'));
    }

    public function create()
    {
        abort_if(Gate::denies('actividades_extraescolare_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividadesExtraescolares.create');
    }

    public function store(StoreActividadesExtraescolareRequest $request)
    {
        $actividadesExtraescolare = ActividadesExtraescolare::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actividadesExtraescolare->id]);
        }

        return redirect()->route('admin.actividades-extraescolares.index');
    }

    public function edit(ActividadesExtraescolare $actividadesExtraescolare)
    {
        abort_if(Gate::denies('actividades_extraescolare_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividadesExtraescolares.edit', compact('actividadesExtraescolare'));
    }

    public function update(UpdateActividadesExtraescolareRequest $request, ActividadesExtraescolare $actividadesExtraescolare)
    {
        $actividadesExtraescolare->update($request->all());

        return redirect()->route('admin.actividades-extraescolares.index');
    }

    public function show(ActividadesExtraescolare $actividadesExtraescolare)
    {
        abort_if(Gate::denies('actividades_extraescolare_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividadesExtraescolares.show', compact('actividadesExtraescolare'));
    }

    public function destroy(ActividadesExtraescolare $actividadesExtraescolare)
    {
        abort_if(Gate::denies('actividades_extraescolare_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesExtraescolare->delete();

        return back();
    }

    public function massDestroy(MassDestroyActividadesExtraescolareRequest $request)
    {
        ActividadesExtraescolare::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('actividades_extraescolare_create') && Gate::denies('actividades_extraescolare_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ActividadesExtraescolare();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
