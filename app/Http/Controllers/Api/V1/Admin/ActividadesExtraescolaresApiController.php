<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ActividadesExtraescolare;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreActividadesExtraescolareRequest;
use App\Http\Requests\UpdateActividadesExtraescolareRequest;
use App\Http\Resources\Admin\ActividadesExtraescolareResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActividadesExtraescolaresApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actividades_extraescolare_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActividadesExtraescolareResource(ActividadesExtraescolare::all());
    }

    public function store(StoreActividadesExtraescolareRequest $request)
    {
        $actividadesExtraescolare = ActividadesExtraescolare::create($request->all());

        return (new ActividadesExtraescolareResource($actividadesExtraescolare))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ActividadesExtraescolare $actividadesExtraescolare)
    {
        abort_if(Gate::denies('actividades_extraescolare_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActividadesExtraescolareResource($actividadesExtraescolare);
    }

    public function update(UpdateActividadesExtraescolareRequest $request, ActividadesExtraescolare $actividadesExtraescolare)
    {
        $actividadesExtraescolare->update($request->all());

        return (new ActividadesExtraescolareResource($actividadesExtraescolare))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ActividadesExtraescolare $actividadesExtraescolare)
    {
        abort_if(Gate::denies('actividades_extraescolare_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesExtraescolare->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
