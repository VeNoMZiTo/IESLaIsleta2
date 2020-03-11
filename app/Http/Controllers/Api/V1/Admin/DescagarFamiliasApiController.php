<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DescagarFamilium;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDescagarFamiliumRequest;
use App\Http\Requests\UpdateDescagarFamiliumRequest;
use App\Http\Resources\Admin\DescagarFamiliumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DescagarFamiliasApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('descagar_familium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DescagarFamiliumResource(DescagarFamilium::all());

    }

    public function store(StoreDescagarFamiliumRequest $request)
    {
        $descagarFamilium = DescagarFamilium::create($request->all());

        if ($request->input('archivo', false)) {
            $descagarFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
        }

        return (new DescagarFamiliumResource($descagarFamilium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(DescagarFamilium $descagarFamilium)
    {
        abort_if(Gate::denies('descagar_familium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DescagarFamiliumResource($descagarFamilium);

    }

    public function update(UpdateDescagarFamiliumRequest $request, DescagarFamilium $descagarFamilium)
    {
        $descagarFamilium->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$descagarFamilium->archivo || $request->input('archivo') !== $descagarFamilium->archivo->file_name) {
                $descagarFamilium->addMedia(storage_path('tmp/uploads/' . $request->input('archivo')))->toMediaCollection('archivo');
            }

        } elseif ($descagarFamilium->archivo) {
            $descagarFamilium->archivo->delete();
        }

        return (new DescagarFamiliumResource($descagarFamilium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(DescagarFamilium $descagarFamilium)
    {
        abort_if(Gate::denies('descagar_familium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descagarFamilium->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
