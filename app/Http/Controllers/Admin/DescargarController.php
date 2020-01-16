<?php

namespace App\Http\Controllers\Admin;

use App\Descargar;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDescargarRequest;
use App\Http\Requests\StoreDescargarRequest;
use App\Http\Requests\UpdateDescargarRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DescargarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('descargar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descargars = Descargar::all();

        return view('admin.descargars.index', compact('descargars'));
    }

    public function create()
    {
        abort_if(Gate::denies('descargar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descargars.create');
    }

    public function store(StoreDescargarRequest $request)
    {
        $descargar = Descargar::create($request->all());

        if ($request->input('docente', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('docente')))->toMediaCollection('docente');
        }

        if ($request->input('directiva', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
        }

        if ($request->input('tutoria', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
        }

        if ($request->input('calescolar', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('calescolar')))->toMediaCollection('calescolar');
        }

        if ($request->input('calpadres', false)) {
            $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('calpadres')))->toMediaCollection('calpadres');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $descargar->id]);
        }

        return redirect()->route('admin.descargars.index');
    }

    public function edit(Descargar $descargar)
    {
        abort_if(Gate::denies('descargar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descargars.edit', compact('descargar'));
    }

    public function update(UpdateDescargarRequest $request, Descargar $descargar)
    {
        $descargar->update($request->all());

        if ($request->input('docente', false)) {
            if (!$descargar->docente || $request->input('docente') !== $descargar->docente->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('docente')))->toMediaCollection('docente');
            }
        } elseif ($descargar->docente) {
            $descargar->docente->delete();
        }

        if ($request->input('directiva', false)) {
            if (!$descargar->directiva || $request->input('directiva') !== $descargar->directiva->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('directiva')))->toMediaCollection('directiva');
            }
        } elseif ($descargar->directiva) {
            $descargar->directiva->delete();
        }

        if ($request->input('tutoria', false)) {
            if (!$descargar->tutoria || $request->input('tutoria') !== $descargar->tutoria->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('tutoria')))->toMediaCollection('tutoria');
            }
        } elseif ($descargar->tutoria) {
            $descargar->tutoria->delete();
        }

        if ($request->input('calescolar', false)) {
            if (!$descargar->calescolar || $request->input('calescolar') !== $descargar->calescolar->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('calescolar')))->toMediaCollection('calescolar');
            }
        } elseif ($descargar->calescolar) {
            $descargar->calescolar->delete();
        }

        if ($request->input('calpadres', false)) {
            if (!$descargar->calpadres || $request->input('calpadres') !== $descargar->calpadres->file_name) {
                $descargar->addMedia(storage_path('tmp/uploads/' . $request->input('calpadres')))->toMediaCollection('calpadres');
            }
        } elseif ($descargar->calpadres) {
            $descargar->calpadres->delete();
        }

        return redirect()->route('admin.descargars.index');
    }

    public function show(Descargar $descargar)
    {
        abort_if(Gate::denies('descargar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.descargars.show', compact('descargar'));
    }

    public function destroy(Descargar $descargar)
    {
        abort_if(Gate::denies('descargar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $descargar->delete();

        return back();
    }

    public function massDestroy(MassDestroyDescargarRequest $request)
    {
        Descargar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('descargar_create') && Gate::denies('descargar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Descargar();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
