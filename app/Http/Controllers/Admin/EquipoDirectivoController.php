<?php

namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\EquipoDirectivo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEquipoDirectivoRequest;
use App\Http\Requests\StoreEquipoDirectivoRequest;
use App\Http\Requests\UpdateEquipoDirectivoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoDirectivoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('equipo_directivo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDirectivos = EquipoDirectivo::all();

        return view('admin.equipoDirectivos.index', compact('equipoDirectivos'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipo_directivo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.equipoDirectivos.create', compact('departamentos'));
    }

    public function store(StoreEquipoDirectivoRequest $request)
    {
        $equipoDirectivo = EquipoDirectivo::create($request->all());

        return redirect()->route('admin.equipo-directivos.index');
    }

    public function edit(EquipoDirectivo $equipoDirectivo)
    {
        abort_if(Gate::denies('equipo_directivo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $equipoDirectivo->load('departamento');

        return view('admin.equipoDirectivos.edit', compact('departamentos', 'equipoDirectivo'));
    }

    public function update(UpdateEquipoDirectivoRequest $request, EquipoDirectivo $equipoDirectivo)
    {
        $equipoDirectivo->update($request->all());

        return redirect()->route('admin.equipo-directivos.index');
    }

    public function show(EquipoDirectivo $equipoDirectivo)
    {
        abort_if(Gate::denies('equipo_directivo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDirectivo->load('departamento');

        return view('admin.equipoDirectivos.show', compact('equipoDirectivo'));
    }

    public function destroy(EquipoDirectivo $equipoDirectivo)
    {
        abort_if(Gate::denies('equipo_directivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDirectivo->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipoDirectivoRequest $request)
    {
        EquipoDirectivo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
