<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJuntaDelegadoRequest;
use App\Http\Requests\StoreJuntaDelegadoRequest;
use App\Http\Requests\UpdateJuntaDelegadoRequest;
use App\JuntaDelegado;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JuntaDelegadoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('junta_delegado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntaDelegados = JuntaDelegado::all();

        return view('admin.juntaDelegados.index', compact('juntaDelegados'));
    }

    public function create()
    {
        abort_if(Gate::denies('junta_delegado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.juntaDelegados.create');
    }

    public function store(StoreJuntaDelegadoRequest $request)
    {
        $juntaDelegado = JuntaDelegado::create($request->all());

        if ($request->input('imagen', false)) {
            $juntaDelegado->addMedia(storage_path('tmp/uploads/' . $request->input('imagen')))->toMediaCollection('imagen');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $juntaDelegado->id]);
        }

        return redirect()->route('admin.junta-delegados.index');
    }

    public function edit(JuntaDelegado $juntaDelegado)
    {
        abort_if(Gate::denies('junta_delegado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.juntaDelegados.edit', compact('juntaDelegado'));
    }

    public function update(UpdateJuntaDelegadoRequest $request, JuntaDelegado $juntaDelegado)
    {
        $juntaDelegado->update($request->all());

        if ($request->input('imagen', false)) {
            if (!$juntaDelegado->imagen || $request->input('imagen') !== $juntaDelegado->imagen->file_name) {
                $juntaDelegado->addMedia(storage_path('tmp/uploads/' . $request->input('imagen')))->toMediaCollection('imagen');
            }
        } elseif ($juntaDelegado->imagen) {
            $juntaDelegado->imagen->delete();
        }

        return redirect()->route('admin.junta-delegados.index');
    }

    public function show(JuntaDelegado $juntaDelegado)
    {
        abort_if(Gate::denies('junta_delegado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.juntaDelegados.show', compact('juntaDelegado'));
    }

    public function destroy(JuntaDelegado $juntaDelegado)
    {
        abort_if(Gate::denies('junta_delegado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntaDelegado->delete();

        return back();
    }

    public function massDestroy(MassDestroyJuntaDelegadoRequest $request)
    {
        JuntaDelegado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('junta_delegado_create') && Gate::denies('junta_delegado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JuntaDelegado();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
