<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CitaPrevium;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitaPreviumRequest;
use App\Http\Requests\UpdateCitaPreviumRequest;
use App\Http\Resources\Admin\CitaPreviumResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitaPreviaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cita_previum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CitaPreviumResource(CitaPrevium::with(['asignatura', 'curso'])->get());
    }

    public function store(StoreCitaPreviumRequest $request)
    {
        $citaPrevium = CitaPrevium::create($request->all());

        return (new CitaPreviumResource($citaPrevium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CitaPrevium $citaPrevium)
    {
        abort_if(Gate::denies('cita_previum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CitaPreviumResource($citaPrevium->load(['asignatura', 'curso']));
    }

    public function update(UpdateCitaPreviumRequest $request, CitaPrevium $citaPrevium)
    {
        $citaPrevium->update($request->all());

        return (new CitaPreviumResource($citaPrevium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CitaPrevium $citaPrevium)
    {
        abort_if(Gate::denies('cita_previum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citaPrevium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
