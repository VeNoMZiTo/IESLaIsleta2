<?php

namespace App\Http\Controllers\Admin;

use App\ArchivosGrupo;
use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyArchivosGrupoRequest;
use App\Http\Requests\StoreArchivosGrupoRequest;
use App\Http\Requests\UpdateArchivosGrupoRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ArchivosGruposControllerUpgrade extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('archivos_grupo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivosGrupos = ArchivosGrupo::all();

        return view('admin.archivosGrupos.index', compact('archivosGrupos'));
    }

    public function create()
    {
        abort_if(Gate::denies('archivos_grupo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');
        $filtro = ArchivosGrupo::with('grupo')->get();

        return view('admin.archivosGrupos.create', compact('grupos','filtro'));
    }

    public function store(StoreArchivosGrupoRequest $request)
    {
        $archivosGrupo = ArchivosGrupo::create($request->all());

        foreach ($request->input('archivos', []) as $file) {
            $archivosGrupo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $archivosGrupo->id]);
        }

        return redirect()->route('admin.archivos-grupos.index');

    }

    public function edit(ArchivosGrupo $archivosGrupo)
    {
        abort_if(Gate::denies('archivos_grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $archivosGrupo->load('grupo', 'team');

        return view('admin.archivosGrupos.edit', compact('grupos', 'archivosGrupo'));
    }

    public function update(UpdateArchivosGrupoRequest $request, ArchivosGrupo $archivosGrupo)
    {
        $archivosGrupo->update($request->all());

        if (count($archivosGrupo->archivos) > 0) {
            foreach ($archivosGrupo->archivos as $media) {
                if (!in_array($media->file_name, $request->input('archivos', []))) {
                    $media->delete();
                }

            }

        }

        $media = $archivosGrupo->archivos->pluck('file_name')->toArray();

        foreach ($request->input('archivos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $archivosGrupo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
            }

        }

        return redirect()->route('admin.archivos-grupos.index');

    }

    public function show(ArchivosGrupo $archivosGrupo)
    {
        abort_if(Gate::denies('archivos_grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivosGrupo->load('grupo', 'team');

        return view('admin.archivosGrupos.show', compact('archivosGrupo'));
    }

    public function destroy(ArchivosGrupo $archivosGrupo)
    {
        abort_if(Gate::denies('archivos_grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivosGrupo->delete();

        return back();

    }

    public function massDestroy(MassDestroyArchivosGrupoRequest $request)
    {
        ArchivosGrupo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('archivos_grupo_create') && Gate::denies('archivos_grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ArchivosGrupo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }

}
