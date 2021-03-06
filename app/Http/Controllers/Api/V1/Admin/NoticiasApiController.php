<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNoticiumRequest;
use App\Http\Requests\UpdateNoticiumRequest;
use App\Http\Resources\Admin\NoticiumResource;
use App\Noticium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoticiasApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('noticium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NoticiumResource(Noticium::all());

    }

    public function store(StoreNoticiumRequest $request)
    {
        $noticium = Noticium::create($request->all());

        if ($request->input('foto', false)) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        if ($request->input('archivos', false)) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
        }

        return (new NoticiumResource($noticium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NoticiumResource($noticium);

    }

    public function update(UpdateNoticiumRequest $request, Noticium $noticium)
    {
        $noticium->update($request->all());

        if ($request->input('foto', false)) {
            if (!$noticium->foto || $request->input('foto') !== $noticium->foto->file_name) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }

        } elseif ($noticium->foto) {
            $noticium->foto->delete();
        }

        if ($request->input('archivos', false)) {
            if (!$noticium->archivos || $request->input('archivos') !== $noticium->archivos->file_name) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $request->input('archivos')))->toMediaCollection('archivos');
            }

        } elseif ($noticium->archivos) {
            $noticium->archivos->delete();
        }

        return (new NoticiumResource($noticium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticium->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
