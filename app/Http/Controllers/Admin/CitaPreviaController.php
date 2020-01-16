<?php

namespace App\Http\Controllers\Admin;

use App\Asginatura;
use App\CitaPrevium;
use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCitaPreviumRequest;
use App\Http\Requests\StoreCitaPreviumRequest;
use App\Http\Requests\UpdateCitaPreviumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitaPreviaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cita_previum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citaPrevia = CitaPrevium::all();

        return view('admin.citaPrevia.index', compact('citaPrevia'));
    }

    public function create()
    {
        abort_if(Gate::denies('cita_previum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asginatura::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cursos = Grupo::all()->pluck('curso', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.citaPrevia.create', compact('asignaturas', 'cursos'));
    }

    public function store(StoreCitaPreviumRequest $request)
    {
        $citaPrevium = CitaPrevium::create($request->all());

        return redirect()->route('admin.cita-previa.index');
    }

    public function edit(CitaPrevium $citaPrevium)
    {
        abort_if(Gate::denies('cita_previum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asginatura::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cursos = Grupo::all()->pluck('curso', 'id')->prepend(trans('global.pleaseSelect'), '');

        $citaPrevium->load('asignatura', 'curso');

        return view('admin.citaPrevia.edit', compact('asignaturas', 'cursos', 'citaPrevium'));
    }

    public function update(UpdateCitaPreviumRequest $request, CitaPrevium $citaPrevium)
    {
        $citaPrevium->update($request->all());

        return redirect()->route('admin.cita-previa.index');
    }

    public function show(CitaPrevium $citaPrevium)
    {
        abort_if(Gate::denies('cita_previum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citaPrevium->load('asignatura', 'curso');

        return view('admin.citaPrevia.show', compact('citaPrevium'));
    }

    public function destroy(CitaPrevium $citaPrevium)
    {
        abort_if(Gate::denies('cita_previum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citaPrevium->delete();

        return back();
    }

    public function massDestroy(MassDestroyCitaPreviumRequest $request)
    {
        CitaPrevium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
