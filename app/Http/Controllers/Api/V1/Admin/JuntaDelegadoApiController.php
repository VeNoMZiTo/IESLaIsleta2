<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreJuntaDelegadoRequest;
use App\Http\Requests\UpdateJuntaDelegadoRequest;
use App\Http\Resources\Admin\JuntaDelegadoResource;
use App\JuntaDelegado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JuntaDelegadoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('junta_delegado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JuntaDelegadoResource(JuntaDelegado::all());
    }

    public function store(StoreJuntaDelegadoRequest $request)
    {
        $juntaDelegado = JuntaDelegado::create($request->all());

        if ($request->input('imagen', false)) {
            $juntaDelegado->addMedia(storage_path('tmp/uploads/' . $request->input('imagen')))->toMediaCollection('imagen');
        }

        return (new JuntaDelegadoResource($juntaDelegado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JuntaDelegado $juntaDelegado)
    {
        abort_if(Gate::denies('junta_delegado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JuntaDelegadoResource($juntaDelegado);
    }

    public function update(UpdateJuntaDelegadoRequest $request, JuntaDelegado $juntaDelegado)
    {
        $juntaDelegado->update($request->all());

        if ($request->input('imagen', false)) {
            if (!$juntaDelegado->imagen || $request->input('imagen') !== $juntaDelegado->imagen->file_name) {
                $juntaDelegado->addMedia(storage_path('tmp/uploads/' . $request->input('imagen')))->toMediaCollection('imagen');
            }
        } elseif ($juntaDelegado->imagen) {
            $juntaDelegado->imagen->delete();
        }

        return (new JuntaDelegadoResource($juntaDelegado))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JuntaDelegado $juntaDelegado)
    {
        abort_if(Gate::denies('junta_delegado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $juntaDelegado->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
