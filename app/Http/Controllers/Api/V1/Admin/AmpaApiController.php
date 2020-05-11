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
