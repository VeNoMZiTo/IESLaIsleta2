<?php

namespace App\Http\Controllers\Admin;

use App\EquipoDocente;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEquipoDocenteRequest;
use App\Http\Requests\StoreEquipoDocenteRequest;
use App\Http\Requests\UpdateEquipoDocenteRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoDocenteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('equipo_docente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDocentes = EquipoDocente::all();

        return view('admin.equipoDocentes.index', compact('equipoDocentes'));
    }

    public function create()
    {
        abort_if(Gate::denies('equipo_docente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipoDocentes.create');
    }

    public function store(StoreEquipoDocenteRequest $request)
    {
        $equipoDocente = EquipoDocente::create($request->all());

        if ($request->input('imprimir', false)) {
            $equipoDocente->addMedia(storage_path('tmp/uploads/' . $request->input('imprimir')))->toMediaCollection('imprimir');
        }

        return redirect()->route('admin.equipo-docentes.index');
    }

    public function edit(EquipoDocente $equipoDocente)
    {
        abort_if(Gate::denies('equipo_docente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipoDocentes.edit', compact('equipoDocente'));
    }

    public function update(UpdateEquipoDocenteRequest $request, EquipoDocente $equipoDocente)
    {
        $equipoDocente->update($request->all());

        if ($request->input('imprimir', false)) {
            if (!$equipoDocente->imprimir || $request->input('imprimir') !== $equipoDocente->imprimir->file_name) {
                $equipoDocente->addMedia(storage_path('tmp/uploads/' . $request->input('imprimir')))->toMediaCollection('imprimir');
            }
        } elseif ($equipoDocente->imprimir) {
            $equipoDocente->imprimir->delete();
        }

        return redirect()->route('admin.equipo-docentes.index');
    }

    public function show(EquipoDocente $equipoDocente)
    {
        abort_if(Gate::denies('equipo_docente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.equipoDocentes.show', compact('equipoDocente'));
    }

    public function destroy(EquipoDocente $equipoDocente)
    {
        abort_if(Gate::denies('equipo_docente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $equipoDocente->delete();

        return back();
    }

    public function massDestroy(MassDestroyEquipoDocenteRequest $request)
    {
        EquipoDocente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
