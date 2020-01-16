<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInformacionRequest;
use App\Http\Requests\StoreInformacionRequest;
use App\Http\Requests\UpdateInformacionRequest;
use App\Informacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformacionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('informacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacions = Informacion::all();

        return view('admin.informacions.index', compact('informacions'));
    }

    public function create()
    {
        abort_if(Gate::denies('informacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacions.create');
    }

    public function store(StoreInformacionRequest $request)
    {
        $informacion = Informacion::create($request->all());

        if ($request->input('foto', false)) {
            $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        foreach ($request->input('archivos', []) as $file) {
            $informacion->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
        }

        return redirect()->route('admin.informacions.index');
    }

    public function edit(Informacion $informacion)
    {
        abort_if(Gate::denies('informacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacions.edit', compact('informacion'));
    }

    public function update(UpdateInformacionRequest $request, Informacion $informacion)
    {
        $informacion->update($request->all());

        if ($request->input('foto', false)) {
            if (!$informacion->foto || $request->input('foto') !== $informacion->foto->file_name) {
                $informacion->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($informacion->foto) {
            $informacion->foto->delete();
        }

        if (count($informacion->archivos) > 0) {
            foreach ($informacion->archivos as $media) {
                if (!in_array($media->file_name, $request->input('archivos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $informacion->archivos->pluck('file_name')->toArray();

        foreach ($request->input('archivos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $informacion->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
            }
        }

        return redirect()->route('admin.informacions.index');
    }

    public function show(Informacion $informacion)
    {
        abort_if(Gate::denies('informacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.informacions.show', compact('informacion'));
    }

    public function destroy(Informacion $informacion)
    {
        abort_if(Gate::denies('informacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyInformacionRequest $request)
    {
        Informacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
