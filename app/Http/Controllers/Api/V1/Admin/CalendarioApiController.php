<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Calendario;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarioRequest;
use App\Http\Requests\UpdateCalendarioRequest;
use App\Http\Resources\Admin\CalendarioResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarioApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('calendario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CalendarioResource(Calendario::all());
    }

    public function store(StoreCalendarioRequest $request)
    {
        $calendario = Calendario::create($request->all());

        return (new CalendarioResource($calendario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Calendario $calendario)
    {
        abort_if(Gate::denies('calendario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CalendarioResource($calendario);
    }

    public function update(UpdateCalendarioRequest $request, Calendario $calendario)
    {
        $calendario->update($request->all());

        return (new CalendarioResource($calendario))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Calendario $calendario)
    {
        abort_if(Gate::denies('calendario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calendario->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
