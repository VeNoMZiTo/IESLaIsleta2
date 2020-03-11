<?php

namespace App\Http\Controllers\Admin;

use App\Asginatura;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsginaturaRequest;
use App\Http\Requests\StoreAsginaturaRequest;
use App\Http\Requests\UpdateAsginaturaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsginaturasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asginatura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asginaturas = Asginatura::all();

        return view('admin.asginaturas.index', compact('asginaturas'));
    }

    public function create()
    {
        abort_if(Gate::denies('asginatura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asginaturas.create');
    }

    public function store(StoreAsginaturaRequest $request)
    {
        $asginatura = Asginatura::create($request->all());

        return redirect()->route('admin.asginaturas.index');

    }

    public function edit(Asginatura $asginatura)
    {
        abort_if(Gate::denies('asginatura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asginaturas.edit', compact('asginatura'));
    }

    public function update(UpdateAsginaturaRequest $request, Asginatura $asginatura)
    {
        $asginatura->update($request->all());

        return redirect()->route('admin.asginaturas.index');

    }

    public function show(Asginatura $asginatura)
    {
        abort_if(Gate::denies('asginatura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.asginaturas.show', compact('asginatura'));
    }

    public function destroy(Asginatura $asginatura)
    {
        abort_if(Gate::denies('asginatura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asginatura->delete();

        return back();

    }

    public function massDestroy(MassDestroyAsginaturaRequest $request)
    {
        Asginatura::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
