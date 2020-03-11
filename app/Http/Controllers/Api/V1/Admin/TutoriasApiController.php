<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTutoriumRequest;
use App\Http\Requests\UpdateTutoriumRequest;
use App\Http\Resources\Admin\TutoriumResource;
use App\Tutorium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutoriasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tutorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TutoriumResource(Tutorium::all());

    }

    public function store(StoreTutoriumRequest $request)
    {
        $tutorium = Tutorium::create($request->all());

        return (new TutoriumResource($tutorium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Tutorium $tutorium)
    {
        abort_if(Gate::denies('tutorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TutoriumResource($tutorium);

    }

    public function update(UpdateTutoriumRequest $request, Tutorium $tutorium)
    {
        $tutorium->update($request->all());

        return (new TutoriumResource($tutorium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Tutorium $tutorium)
    {
        abort_if(Gate::denies('tutorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorium->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
