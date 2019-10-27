<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\EquipoDocente;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEquipoDocenteRequest;
use App\Http\Requests\UpdateEquipoDocenteRequest;
use App\Http\Resources\Admin\EquipoDocenteResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoDocenteApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('equipo_docente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipoDocenteResource(EquipoDocente::with(['departamento'])->get());
    }

    public function store(StoreEquipoDocenteRequest $request)
    {
        $equipoDocente = EquipoDocente::create($request->all());

        if ($request->input('descarga', false)) {
            $equipoDocente->addMedia(storage_path('tmp/uploads/' . $request->input('descarga')))->toMediaCollection('descarga');
        }

        return (new EquipoDocenteResource($equipoDocente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EquipoDocente $equipoDocente)
    {
        abort_if(Gate::denies('equipo_docente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipoDocenteResource($equipoDocente->load(['departamento']));
    }

    public function update(UpdateEquipoDocenteRequest $request, EquipoDocente $equipoDocente)
    {
        $equipoDocente->update($request->all());

        if ($request->input('descarga', false)) {
            if (!$equipoDocente->descarga || $request->input('descarga') !== $equipoDocente->descarga->file_name) {
                $equipoDocente->addMedia(storage_path('tmp/uploads/' . $request->input('descarga')))->toMediaCollection('descarga');
            }
        } elseif ($equipoDocente->descarga) {
            $equipoDocente->descarga->delete();
        }

        return (new EquipoDocenteResource($equipoDocente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EquipoDocente $equipoDocente)
    {
        abort_if(Gate::denies('equipo_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDocente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
