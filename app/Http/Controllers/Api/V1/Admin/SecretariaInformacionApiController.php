<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSecretariaInformacionRequest;
use App\Http\Requests\UpdateSecretariaInformacionRequest;
use App\Http\Resources\Admin\SecretariaInformacionResource;
use App\SecretariaInformacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecretariaInformacionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('secretaria_informacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecretariaInformacionResource(SecretariaInformacion::all());
    }

    public function store(StoreSecretariaInformacionRequest $request)
    {
        $secretariaInformacion = SecretariaInformacion::create($request->all());

        return (new SecretariaInformacionResource($secretariaInformacion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SecretariaInformacion $secretariaInformacion)
    {
        abort_if(Gate::denies('secretaria_informacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SecretariaInformacionResource($secretariaInformacion);
    }

    public function update(UpdateSecretariaInformacionRequest $request, SecretariaInformacion $secretariaInformacion)
    {
        $secretariaInformacion->update($request->all());

        return (new SecretariaInformacionResource($secretariaInformacion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SecretariaInformacion $secretariaInformacion)
    {
        abort_if(Gate::denies('secretaria_informacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $secretariaInformacion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
