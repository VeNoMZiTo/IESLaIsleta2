<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Descargar;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDescargarRequest;
use App\Http\Requests\UpdateDescargarRequest;
use App\Http\Resources\Admin\DescargarResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DescargarApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('descargar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DescargarResource(Descargar::all());

    }

    public function store(StoreDescargarRequest $request)
    {
        $descargar = Descargar::create($request->all());

        if ($request->input('docente', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('docente')))->toMediaCollection('docente');
        }

        if ($request->input('directiva', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
        }

        return (new DescargarResource($descargar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Descargar $descargar)
    {
        abort_if(Gate::denies('descargar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DescargarResource($descargar);

    }

    public function update(UpdateDescargarRequest $request, Descargar $descargar)
    {
        $descargar->update($request->all());

        if ($request->input('docente', false)) {
            if (!$descargar->docente || $request->input('docente') !== $descargar->docente->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('docente')))->toMediaCollection('docente');
            }

        } elseif ($descargar->docente) {
            $descargar->docente->delete();
        }

        if ($request->input('directiva', false)) {
            if (!$descargar->directiva || $request->input('directiva') !== $descargar->directiva->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
            }

        } elseif ($descargar->directiva) {
            $descargar->directiva->delete();
        }

        return (new DescargarResource($descargar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Descargar $descargar)
    {
        abort_if(Gate::denies('descargar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descargar->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
