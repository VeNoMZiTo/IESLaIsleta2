<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySecretariaInformacionRequest;
use App\Http\Requests\StoreSecretariaInformacionRequest;
use App\Http\Requests\UpdateSecretariaInformacionRequest;
use App\SecretariaInformacion;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SecretariaInformacionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('secretaria_informacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretariaInformacions = SecretariaInformacion::all();

        return view('admin.secretariaInformacions.index', compact('secretariaInformacions'));
    }

    public function create()
    {
        abort_if(Gate::denies('secretaria_informacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.secretariaInformacions.create');
    }

    public function store(StoreSecretariaInformacionRequest $request)
    {
        $secretariaInformacion = SecretariaInformacion::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $secretariaInformacion->id]);
        }

        return redirect()->route('admin.secretaria-informacions.index');
    }

    public function edit(SecretariaInformacion $secretariaInformacion)
    {
        abort_if(Gate::denies('secretaria_informacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.secretariaInformacions.edit', compact('secretariaInformacion'));
    }

    public function update(UpdateSecretariaInformacionRequest $request, SecretariaInformacion $secretariaInformacion)
    {
        $secretariaInformacion->update($request->all());

        return redirect()->route('admin.secretaria-informacions.index');
    }

    public function show(SecretariaInformacion $secretariaInformacion)
    {
        abort_if(Gate::denies('secretaria_informacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.secretariaInformacions.show', compact('secretariaInformacion'));
    }

    public function destroy(SecretariaInformacion $secretariaInformacion)
    {
        abort_if(Gate::denies('secretaria_informacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretariaInformacion->delete();

        return back();
    }

    public function massDestroy(MassDestroySecretariaInformacionRequest $request)
    {
        SecretariaInformacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('secretaria_informacion_create') && Gate::denies('secretaria_informacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SecretariaInformacion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
