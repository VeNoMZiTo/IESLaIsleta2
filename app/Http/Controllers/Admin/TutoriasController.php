<?php

namespace App\Http\Controllers\Admin;

use App\Departamento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTutoriumRequest;
use App\Http\Requests\StoreTutoriumRequest;
use App\Http\Requests\UpdateTutoriumRequest;
use App\Tutorium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutoriasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tutorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutoria = Tutorium::all();

        return view('admin.tutoria.index', compact('tutoria'));
    }

    public function create()
    {
        abort_if(Gate::denies('tutorium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tutoria.create', compact('departamentos'));
    }

    public function store(StoreTutoriumRequest $request)
    {
        $tutorium = Tutorium::create($request->all());

        if ($request->input('descarga', false)) {
            $tutorium->addMedia(storage_path('tmp/uploads/' . $request->input('descarga')))->toMediaCollection('descarga');
        }

        return redirect()->route('admin.tutoria.index');
    }

    public function edit(Tutorium $tutorium)
    {
        abort_if(Gate::denies('tutorium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departamentos = Departamento::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tutorium->load('departamento');

        return view('admin.tutoria.edit', compact('departamentos', 'tutorium'));
    }

    public function update(UpdateTutoriumRequest $request, Tutorium $tutorium)
    {
        $tutorium->update($request->all());

        if ($request->input('descarga', false)) {
            if (!$tutorium->descarga || $request->input('descarga') !== $tutorium->descarga->file_name) {
                $tutorium->addMedia(storage_path('tmp/uploads/' . $request->input('descarga')))->toMediaCollection('descarga');
            }
        } elseif ($tutorium->descarga) {
            $tutorium->descarga->delete();
        }

        return redirect()->route('admin.tutoria.index');
    }

    public function show(Tutorium $tutorium)
    {
        abort_if(Gate::denies('tutorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorium->load('departamento');

        return view('admin.tutoria.show', compact('tutorium'));
    }

    public function destroy(Tutorium $tutorium)
    {
        abort_if(Gate::denies('tutorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tutorium->delete();

        return back();
    }

    public function massDestroy(MassDestroyTutoriumRequest $request)
    {
        Tutorium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
