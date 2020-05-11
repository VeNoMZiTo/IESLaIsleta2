<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProyectoRequest;
use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Proyecto;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProyectosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Proyecto::all();

        return view('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('proyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proyectos.create');
    }

    public function store(StoreProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proyecto->id]);
        }

        return redirect()->route('admin.proyectos.index');
    }

    public function edit(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proyectos.edit', compact('proyecto'));
    }

    public function update(UpdateProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());

        return redirect()->route('admin.proyectos.index');
    }

    public function show(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proyectos.show', compact('proyecto'));
    }

    public function destroy(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyProyectoRequest $request)
    {
        Proyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('proyecto_create') && Gate::denies('proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Proyecto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
