<?php

namespace App\Http\Controllers\Admin;

use App\Ampa;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAmpaRequest;
use App\Http\Requests\StoreAmpaRequest;
use App\Http\Requests\UpdateAmpaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AmpaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ampa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ampas = Ampa::all();

        return view('admin.ampas.index', compact('ampas'));
    }

    public function create()
    {
        abort_if(Gate::denies('ampa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.create');
    }

    public function store(StoreAmpaRequest $request)
    {
        $ampa = Ampa::create($request->all());

        if ($request->input('foto', false)) {
            $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        foreach ($request->input('archivos', []) as $file) {
            $ampa->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
        }

        return redirect()->route('admin.ampas.index');
    }

    public function edit(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.edit', compact('ampa'));
    }

    public function update(UpdateAmpaRequest $request, Ampa $ampa)
    {
        $ampa->update($request->all());

        if ($request->input('foto', false)) {
            if (!$ampa->foto || $request->input('foto') !== $ampa->foto->file_name) {
                $ampa->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($ampa->foto) {
            $ampa->foto->delete();
        }

        if (count($ampa->archivos) > 0) {
            foreach ($ampa->archivos as $media) {
                if (!in_array($media->file_name, $request->input('archivos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $ampa->archivos->pluck('file_name')->toArray();

        foreach ($request->input('archivos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $ampa->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
            }
        }

        return redirect()->route('admin.ampas.index');
    }

    public function show(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ampas.show', compact('ampa'));
    }

    public function destroy(Ampa $ampa)
    {
        abort_if(Gate::denies('ampa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ampa->delete();

        return back();
    }

    public function massDestroy(MassDestroyAmpaRequest $request)
    {
        Ampa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
