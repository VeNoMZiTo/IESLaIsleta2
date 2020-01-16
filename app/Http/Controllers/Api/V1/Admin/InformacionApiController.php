<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreInformacionRequest;
use App\Http\Requests\UpdateInformacionRequest;
use App\Http\Resources\Admin\InformacionResource;
use App\Informacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('informacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacionResource(Informacion::all());
    }

    public function store(StoreInformacionRequest $request)
    {
        $informacion = Informacion::create($request->all());

        if ($request->input('foto', false)) {
            $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        if ($request->input('archivos', false)) {
            $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
        }

        return (new InformacionResource($informacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Informacion $informacion)
    {
        abort_if(Gate::denies('informacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformacionResource($informacion);
    }

    public function update(UpdateInformacionRequest $request, Informacion $informacion)
    {
        $informacion->update($request->all());

        if ($request->input('foto', false)) {
            if (!$informacion->foto || $request->input('foto') !== $informacion->foto->file_name) {
                $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($informacion->foto) {
            $informacion->foto->delete();
        }

        if ($request->input('archivos', false)) {
            if (!$informacion->archivos || $request->input('archivos') !== $informacion->archivos->file_name) {
                $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
            }
        } elseif ($informacion->archivos) {
            $informacion->archivos->delete();
        }

        return (new InformacionResource($informacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Informacion $informacion)
    {
        abort_if(Gate::denies('informacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
