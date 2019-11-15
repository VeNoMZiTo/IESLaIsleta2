<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImpresoRequest;
use App\Http\Requests\StoreImpresoRequest;
use App\Http\Requests\UpdateImpresoRequest;
use App\Impreso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImpresosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('impreso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impresos = Impreso::all();

        return view('admin.impresos.index', compact('impresos'));
    }

    public function create()
    {
        abort_if(Gate::denies('impreso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.create');
    }

    public function store(StoreImpresoRequest $request)
    {
        $impreso = Impreso::create($request->all());

        foreach ($request->input('archivo', []) as $file) {
            $impreso->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivo');
        }

        return redirect()->route('admin.impresos.index');
    }

    public function edit(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.edit', compact('impreso'));
    }

    public function update(UpdateImpresoRequest $request, Impreso $impreso)
    {
        $impreso->update($request->all());

        if (count($impreso->archivo) > 0) {
            foreach ($impreso->archivo as $media) {
                if (!in_array($media->file_name, $request->input('archivo', []))) {
                    $media->delete();
                }
            }
        }

        $media = $impreso->archivo->pluck('file_name')->toArray();

        foreach ($request->input('archivo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $impreso->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivo');
            }
        }

        return redirect()->route('admin.impresos.index');
    }

    public function show(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impresos.show', compact('impreso'));
    }

    public function destroy(Impreso $impreso)
    {
        abort_if(Gate::denies('impreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impreso->delete();

        return back();
    }

    public function massDestroy(MassDestroyImpresoRequest $request)
    {
        Impreso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
