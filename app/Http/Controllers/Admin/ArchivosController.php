<?php

namespace App\Http\Controllers\Admin;

use App\Archivo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyArchivoRequest;
use App\Http\Requests\StoreArchivoRequest;
use App\Http\Requests\UpdateArchivoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchivosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('archivo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivos = Archivo::all();

        return view('admin.archivos.index', compact('archivos'));
    }

    public function create()
    {
        abort_if(Gate::denies('archivo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archivos.create');
    }

    public function store(StoreArchivoRequest $request)
    {
        $archivo = Archivo::create($request->all());

        if ($request->input('docentes', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('docentes')))->toMediaCollection('docentes');
        }

        if ($request->input('directiva', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
        }

        if ($request->input('tutoria', false)) {
            $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
        }

        return redirect()->route('admin.archivos.index');
    }

    public function edit(Archivo $archivo)
    {
        abort_if(Gate::denies('archivo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archivos.edit', compact('archivo'));
    }

    public function update(UpdateArchivoRequest $request, Archivo $archivo)
    {
        $archivo->update($request->all());

        if ($request->input('docentes', false)) {
            if (!$archivo->docentes || $request->input('docentes') !== $archivo->docentes->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('docentes')))->toMediaCollection('docentes');
            }
        } elseif ($archivo->docentes) {
            $archivo->docentes->delete();
        }

        if ($request->input('directiva', false)) {
            if (!$archivo->directiva || $request->input('directiva') !== $archivo->directiva->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
            }
        } elseif ($archivo->directiva) {
            $archivo->directiva->delete();
        }

        if ($request->input('tutoria', false)) {
            if (!$archivo->tutoria || $request->input('tutoria') !== $archivo->tutoria->file_name) {
                $archivo->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
            }
        } elseif ($archivo->tutoria) {
            $archivo->tutoria->delete();
        }

        return redirect()->route('admin.archivos.index');
    }

    public function show(Archivo $archivo)
    {
        abort_if(Gate::denies('archivo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archivos.show', compact('archivo'));
    }

    public function destroy(Archivo $archivo)
    {
        abort_if(Gate::denies('archivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivo->delete();

        return back();
    }

    public function massDestroy(MassDestroyArchivoRequest $request)
    {
        Archivo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
