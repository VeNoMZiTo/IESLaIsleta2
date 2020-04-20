<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ArchivosGrupo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreArchivosGrupoRequest;
use App\Http\Requests\UpdateArchivosGrupoRequest;
use App\Http\Resources\Admin\ArchivosGrupoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchivosGruposApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('archivos_grupo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArchivosGrupoResource(ArchivosGrupo::with(['grupo', 'team'])->get());

    }

    public function store(StoreArchivosGrupoRequest $request)
    {
        $archivosGrupo = ArchivosGrupo::create($request->all());

        if ($request->input('archivos', false)) {
            $archivosGrupo->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
        }

        return (new ArchivosGrupoResource($archivosGrupo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(ArchivosGrupo $archivosGrupo)
    {
        abort_if(Gate::denies('archivos_grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArchivosGrupoResource($archivosGrupo->load(['grupo', 'team']));

    }

    public function update(UpdateArchivosGrupoRequest $request, ArchivosGrupo $archivosGrupo)
    {
        $archivosGrupo->update($request->all());

        if ($request->input('archivos', false)) {
            if (!$archivosGrupo->archivos || $request->input('archivos') !== $archivosGrupo->archivos->file_name) {
                $archivosGrupo->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
            }

        } elseif ($archivosGrupo->archivos) {
            $archivosGrupo->archivos->delete();
        }

        return (new ArchivosGrupoResource($archivosGrupo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(ArchivosGrupo $archivosGrupo)
    {
        abort_if(Gate::denies('archivos_grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivosGrupo->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
