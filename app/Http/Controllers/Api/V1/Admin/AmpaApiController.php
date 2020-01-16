<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Ampa;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAmpaRequest;
use App\Http\Requests\UpdateAmpaRequest;
use App\Http\Resources\Admin\AmpaResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AmpaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ampa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmpaResource(Ampa::all());
    }

    public function store(StoreAmpaRequest $request)
    {
        $ampa = Ampa::create($request->all());

        if ($request->input('foto', false)) {
            $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        if ($request->input('archivos', false)) {
            $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
        }

        return (new AmpaResource($ampa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AmpaResource($ampa);
    }

    public function update(UpdateAmpaRequest $request, Ampa $ampa)
    {
        $ampa->update($request->all());

        if ($request->input('foto', false)) {
            if (!$ampa->foto || $request->input('foto') !== $ampa->foto->file_name) {
                $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($ampa->foto) {
            $ampa->foto->delete();
        }

        if ($request->input('archivos', false)) {
            if (!$ampa->archivos || $request->input('archivos') !== $ampa->archivos->file_name) {
                $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
            }
        } elseif ($ampa->archivos) {
            $ampa->archivos->delete();
        }

        return (new AmpaResource($ampa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ampa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
