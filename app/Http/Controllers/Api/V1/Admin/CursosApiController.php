<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Http\Resources\Admin\CursoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CursosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('curso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CursoResource(Curso::with(['asignatura'])->get());

    }

    public function store(StoreCursoRequest $request)
    {
        $curso = Curso::create($request->all());

        return (new CursoResource($curso))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Curso $curso)
    {
        abort_if(Gate::denies('curso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CursoResource($curso->load(['asignatura']));

    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $curso->update($request->all());

        return (new CursoResource($curso))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Curso $curso)
    {
        abort_if(Gate::denies('curso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $curso->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
