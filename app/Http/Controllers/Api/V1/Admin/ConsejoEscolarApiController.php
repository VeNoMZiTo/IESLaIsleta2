<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ConsejoEscolar;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreConsejoEscolarRequest;
use App\Http\Requests\UpdateConsejoEscolarRequest;
use App\Http\Resources\Admin\ConsejoEscolarResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsejoEscolarApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('consejo_escolar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConsejoEscolarResource(ConsejoEscolar::all());
    }

    public function store(StoreConsejoEscolarRequest $request)
    {
        $consejoEscolar = ConsejoEscolar::create($request->all());

        return (new ConsejoEscolarResource($consejoEscolar))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConsejoEscolar $consejoEscolar)
    {
        abort_if(Gate::denies('consejo_escolar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConsejoEscolarResource($consejoEscolar);
    }

    public function update(UpdateConsejoEscolarRequest $request, ConsejoEscolar $consejoEscolar)
    {
        $consejoEscolar->update($request->all());

        return (new ConsejoEscolarResource($consejoEscolar))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConsejoEscolar $consejoEscolar)
    {
        abort_if(Gate::denies('consejo_escolar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consejoEscolar->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
