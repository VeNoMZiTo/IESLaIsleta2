<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Horario;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Http\Resources\Admin\HorarioResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorarioApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HorarioResource(Horario::with(['curso'])->get());
    }

    public function store(StoreHorarioRequest $request)
    {
        $horario = Horario::create($request->all());

        return (new HorarioResource($horario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Horario $horario)
    {
        abort_if(Gate::denies('horario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HorarioResource($horario->load(['curso']));
    }

    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        $horario->update($request->all());

        return (new HorarioResource($horario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Horario $horario)
    {
        abort_if(Gate::denies('horario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
