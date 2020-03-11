<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Asginatura;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAsginaturaRequest;
use App\Http\Requests\UpdateAsginaturaRequest;
use App\Http\Resources\Admin\AsginaturaResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsginaturasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asginatura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsginaturaResource(Asginatura::all());

    }

    public function store(StoreAsginaturaRequest $request)
    {
        $asginatura = Asginatura::create($request->all());

        return (new AsginaturaResource($asginatura))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Asginatura $asginatura)
    {
        abort_if(Gate::denies('asginatura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AsginaturaResource($asginatura);

    }

    public function update(UpdateAsginaturaRequest $request, Asginatura $asginatura)
    {
        $asginatura->update($request->all());

        return (new AsginaturaResource($asginatura))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Asginatura $asginatura)
    {
        abort_if(Gate::denies('asginatura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asginatura->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
