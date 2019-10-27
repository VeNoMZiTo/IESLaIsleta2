<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\EquipoDirectivo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEquipoDirectivoRequest;
use App\Http\Requests\UpdateEquipoDirectivoRequest;
use App\Http\Resources\Admin\EquipoDirectivoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoDirectivoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('equipo_directivo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipoDirectivoResource(EquipoDirectivo::with(['departamento'])->get());
    }

    public function store(StoreEquipoDirectivoRequest $request)
    {
        $equipoDirectivo = EquipoDirectivo::create($request->all());

        if ($request->input('descargar', false)) {
            $equipoDirectivo->addMedia(storage_path('tmp/uploads/' . $request->input('descargar')))->toMediaCollection('descargar');
        }

        return (new EquipoDirectivoResource($equipoDirectivo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EquipoDirectivo $equipoDirectivo)
    {
        abort_if(Gate::denies('equipo_directivo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EquipoDirectivoResource($equipoDirectivo->load(['departamento']));
    }

    public function update(UpdateEquipoDirectivoRequest $request, EquipoDirectivo $equipoDirectivo)
    {
        $equipoDirectivo->update($request->all());

        if ($request->input('descargar', false)) {
            if (!$equipoDirectivo->descargar || $request->input('descargar') !== $equipoDirectivo->descargar->file_name) {
                $equipoDirectivo->addMedia(storage_path('tmp/uploads/' . $request->input('descargar')))->toMediaCollection('descargar');
            }
        } elseif ($equipoDirectivo->descargar) {
            $equipoDirectivo->descargar->delete();
        }

        return (new EquipoDirectivoResource($equipoDirectivo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EquipoDirectivo $equipoDirectivo)
    {
        abort_if(Gate::denies('equipo_directivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDirectivo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
