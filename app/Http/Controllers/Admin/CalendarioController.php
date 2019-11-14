<?php

namespace App\Http\Controllers\Admin;

use App\Calendario;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCalendarioRequest;
use App\Http\Requests\StoreCalendarioRequest;
use App\Http\Requests\UpdateCalendarioRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('calendario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calendarios = Calendario::all();

        return view('admin.calendarios.index', compact('calendarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('calendario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendarios.create');
    }

    public function store(StoreCalendarioRequest $request)
    {
        $calendario = Calendario::create($request->all());

        return redirect()->route('admin.calendarios.index');
    }

    public function edit(Calendario $calendario)
    {
        abort_if(Gate::denies('calendario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendarios.edit', compact('calendario'));
    }

    public function update(UpdateCalendarioRequest $request, Calendario $calendario)
    {
        $calendario->update($request->all());

        return redirect()->route('admin.calendarios.index');
    }

    public function show(Calendario $calendario)
    {
        abort_if(Gate::denies('calendario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.calendarios.show', compact('calendario'));
    }

    public function destroy(Calendario $calendario)
    {
        abort_if(Gate::denies('calendario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calendario->delete();

        return back();
    }

    public function massDestroy(MassDestroyCalendarioRequest $request)
    {
        Calendario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
