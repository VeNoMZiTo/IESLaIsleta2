<?php

namespace App\Http\Controllers\Admin;

use App\Actividade;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActividadeRequest;
use App\Http\Requests\StoreActividadeRequest;
use App\Http\Requests\UpdateActividadeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActividadesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actividade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividades = Actividade::all();

        return view('admin.actividades.index', compact('actividades'));
    }

    public function create()
    {
        abort_if(Gate::denies('actividade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividades.create');
    }

    public function store(StoreActividadeRequest $request)
    {
        $actividade = Actividade::create($request->all());

        foreach ($request->input('foto', []) as $file) {
            $actividade->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
        }

        return redirect()->route('admin.actividades.index');
    }

    public function edit(Actividade $actividade)
    {
        abort_if(Gate::denies('actividade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividades.edit', compact('actividade'));
    }

    public function update(UpdateActividadeRequest $request, Actividade $actividade)
    {
        $actividade->update($request->all());

        if (count($actividade->foto) > 0) {
            foreach ($actividade->foto as $media) {
                if (!in_array($media->file_name, $request->input('foto', []))) {
                    $media->delete();
                }
            }
        }

        $media = $actividade->foto->pluck('file_name')->toArray();

        foreach ($request->input('foto', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $actividade->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
            }
        }

        return redirect()->route('admin.actividades.index');
    }

    public function show(Actividade $actividade)
    {
        abort_if(Gate::denies('actividade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actividades.show', compact('actividade'));
    }

    public function destroy(Actividade $actividade)
    {
        abort_if(Gate::denies('actividade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividade->delete();

        return back();
    }

    public function massDestroy(MassDestroyActividadeRequest $request)
    {
        Actividade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
