<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Archivo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreArchivoRequest;
use App\Http\Requests\UpdateArchivoRequest;
use App\Http\Resources\Admin\ArchivoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchivosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('archivo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArchivoResource(Archivo::all());
    }

    public function store(StoreArchivoRequest $request)
    {
        $archivo = Archivo::create($request->all());

        if ($request->input('docentes', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('docentes')))->toMediaCollection('docentes');
        }

        if ($request->input('directiva', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
        }

        if ($request->input('tutoria', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
        }

        return (new ArchivoResource($archivo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Archivo $archivo)
    {
        abort_if(Gate::denies('archivo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArchivoResource($archivo);
    }

    public function update(UpdateArchivoRequest $request, Archivo $archivo)
    {
        $archivo->update($request->all());

        if ($request->input('docentes', false)) {
            if (!$archivo->docentes || $request->input('docentes') !== $archivo->docentes->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('docentes')))->toMediaCollection('docentes');
            }
        } elseif ($archivo->docentes) {
            $archivo->docentes->delete();
        }

        if ($request->input('directiva', false)) {
            if (!$archivo->directiva || $request->input('directiva') !== $archivo->directiva->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
            }
        } elseif ($archivo->directiva) {
            $archivo->directiva->delete();
        }

        if ($request->input('tutoria', false)) {
            if (!$archivo->tutoria || $request->input('tutoria') !== $archivo->tutoria->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
            }
        } elseif ($archivo->tutoria) {
            $archivo->tutoria->delete();
        }

        return (new ArchivoResource($archivo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Archivo $archivo)
    {
        abort_if(Gate::denies('archivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
