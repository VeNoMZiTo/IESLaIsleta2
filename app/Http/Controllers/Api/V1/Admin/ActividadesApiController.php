<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Actividade;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreActividadeRequest;
use App\Http\Requests\UpdateActividadeRequest;
use App\Http\Resources\Admin\ActividadeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActividadesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actividade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActividadeResource(Actividade::all());

    }

    public function store(StoreActividadeRequest $request)
    {
        $actividade = Actividade::create($request->all());

        if ($request->input('foto', false)) {
            $actividade->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        if ($request->input('archivos', false)) {
            $actividade->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
        }

        return (new ActividadeResource($actividade))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Actividade $actividade)
    {
        abort_if(Gate::denies('actividade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActividadeResource($actividade);

    }

    public function update(UpdateActividadeRequest $request, Actividade $actividade)
    {
        $actividade->update($request->all());

        if ($request->input('foto', false)) {
            if (!$actividade->foto || $request->input('foto') !== $actividade->foto->file_name) {
                $actividade->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }

        } elseif ($actividade->foto) {
            $actividade->foto->delete();
        }

        if ($request->input('archivos', false)) {
            if (!$actividade->archivos || $request->input('archivos') !== $actividade->archivos->file_name) {
                $actividade->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
            }

        } elseif ($actividade->archivos) {
            $actividade->archivos->delete();
        }

        return (new ActividadeResource($actividade))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Actividade $actividade)
    {
        abort_if(Gate::denies('actividade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividade->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
