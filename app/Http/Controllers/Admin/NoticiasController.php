<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNoticiumRequest;
use App\Http\Requests\StoreNoticiumRequest;
use App\Http\Requests\UpdateNoticiumRequest;
use App\Noticium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoticiasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('noticium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticia = Noticium::all();

        return view('admin.noticia.index', compact('noticia'));
    }

    public function create()
    {
        abort_if(Gate::denies('noticium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.create');
    }

    public function store(StoreNoticiumRequest $request)
    {
        $noticium = Noticium::create($request->all());

        foreach ($request->input('foto', []) as $file) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
        }

        foreach ($request->input('archivos', []) as $file) {
            $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
        }

        return redirect()->route('admin.noticia.index');
    }

    public function edit(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.edit', compact('noticium'));
    }

    public function update(UpdateNoticiumRequest $request, Noticium $noticium)
    {
        $noticium->update($request->all());

        if (count($noticium->foto) > 0) {
            foreach ($noticium->foto as $media) {
                if (!in_array($media->file_name, $request->input('foto', []))) {
                    $media->delete();
                }
            }
        }

        $media = $noticium->foto->pluck('file_name')->toArray();

        foreach ($request->input('foto', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
            }
        }

        if (count($noticium->archivos) > 0) {
            foreach ($noticium->archivos as $media) {
                if (!in_array($media->file_name, $request->input('archivos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $noticium->archivos->pluck('file_name')->toArray();

        foreach ($request->input('archivos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $noticium->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('archivos');
            }
        }

        return redirect()->route('admin.noticia.index');
    }

    public function show(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.noticia.show', compact('noticium'));
    }

    public function destroy(Noticium $noticium)
    {
        abort_if(Gate::denies('noticium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticium->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticiumRequest $request)
    {
        Noticium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
