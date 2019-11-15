<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreImpresoRequest;
use App\Http\Requests\UpdateImpresoRequest;
use App\Http\Resources\Admin\ImpresoResource;
use App\Impreso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImpresosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('impreso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImpresoResource(Impreso::all());
    }

    public function store(StoreImpresoRequest $request)
    {
        $impreso = Impreso::create($request->all());

        if ($request->input('archivo', false)) {
            $impreso->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        return (new ImpresoResource($impreso))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImpresoResource($impreso);
    }

    public function update(UpdateImpresoRequest $request, Impreso $impreso)
    {
        $impreso->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$impreso->archivo || $request->input('archivo') !== $impreso->archivo->file_name) {
                $impreso->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }
        } elseif ($impreso->archivo) {
            $impreso->archivo->delete();
        }

        return (new ImpresoResource($impreso))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impreso->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
