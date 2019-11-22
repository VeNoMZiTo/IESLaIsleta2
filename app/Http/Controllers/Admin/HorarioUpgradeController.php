<?php

namespace App\Http\Controllers\Admin;

use App\Grupo;
use App\Horario;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHorarioRequest;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorarioUpgradeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarios = Horario::all();

        return view('admin.horarios.index', compact('horarios'));
    }

    public function store(StoreHorarioRequest $request)
    {
        $horario = Horario::create($request->all());

        return redirect()->route('admin.horarios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('horario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cursos = Grupo::all()->pluck('curso', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.horarios.createUpgrade', compact('cursos'));
    }

    public function edit(Horario $horario)
    {
        abort_if(Gate::denies('horario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cursos = Grupo::all()->pluck('curso', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horario->load('curso');

        return view('admin.horarios.editUpgrade', compact('cursos', 'horario'));
    }
    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index');
    }
    public function show(Horario $horario)
    {
        abort_if(Gate::denies('horario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->load('curso');

        return view('admin.horarios.show', compact('horario'));
    }

    public function destroy(Horario $horario)
    {
        abort_if(Gate::denies('horario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->delete();

        return back();
    }

    public function massDestroy(MassDestroyHorarioRequest $request)
    {
        Horario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
