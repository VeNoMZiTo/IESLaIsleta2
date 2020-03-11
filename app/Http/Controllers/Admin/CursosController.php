<?php

namespace App\Http\Controllers\Admin;

use App\Asginatura;
use App\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCursoRequest;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CursosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('curso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cursos = Curso::all();

        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        abort_if(Gate::denies('curso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asginatura::all()->pluck('asginaturas', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cursos.create', compact('asignaturas'));
    }

    public function store(StoreCursoRequest $request)
    {
        $curso = Curso::create($request->all());

        return redirect()->route('admin.cursos.index');

    }

    public function edit(Curso $curso)
    {
        abort_if(Gate::denies('curso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asginatura::all()->pluck('asginaturas', 'id')->prepend(trans('global.pleaseSelect'), '');

        $curso->load('asignatura');

        return view('admin.cursos.edit', compact('asignaturas', 'curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $curso->update($request->all());

        return redirect()->route('admin.cursos.index');

    }

    public function show(Curso $curso)
    {
        abort_if(Gate::denies('curso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $curso->load('asignatura');

        return view('admin.cursos.show', compact('curso'));
    }

    public function destroy(Curso $curso)
    {
        abort_if(Gate::denies('curso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $curso->delete();

        return back();

    }

    public function massDestroy(MassDestroyCursoRequest $request)
    {
        Curso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
