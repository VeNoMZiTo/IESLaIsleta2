<?php

namespace App\Http\Controllers\Admin;

use App\ConsejoEscolar;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyConsejoEscolarRequest;
use App\Http\Requests\StoreConsejoEscolarRequest;
use App\Http\Requests\UpdateConsejoEscolarRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ConsejoEscolarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('consejo_escolar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consejoEscolars = ConsejoEscolar::all();

        return view('admin.consejoEscolars.index', compact('consejoEscolars'));
    }

    public function create()
    {
        abort_if(Gate::denies('consejo_escolar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consejoEscolars.create');
    }

    public function store(StoreConsejoEscolarRequest $request)
    {
        $consejoEscolar = ConsejoEscolar::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $consejoEscolar->id]);
        }

        return redirect()->route('admin.consejo-escolars.index');
    }

    public function edit(ConsejoEscolar $consejoEscolar)
    {
        abort_if(Gate::denies('consejo_escolar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consejoEscolars.edit', compact('consejoEscolar'));
    }

    public function update(UpdateConsejoEscolarRequest $request, ConsejoEscolar $consejoEscolar)
    {
        $consejoEscolar->update($request->all());

        return redirect()->route('admin.consejo-escolars.index');
    }

    public function show(ConsejoEscolar $consejoEscolar)
    {
        abort_if(Gate::denies('consejo_escolar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.consejoEscolars.show', compact('consejoEscolar'));
    }

    public function destroy(ConsejoEscolar $consejoEscolar)
    {
        abort_if(Gate::denies('consejo_escolar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consejoEscolar->delete();

        return back();
    }

    public function massDestroy(MassDestroyConsejoEscolarRequest $request)
    {
        ConsejoEscolar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('consejo_escolar_create') && Gate::denies('consejo_escolar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ConsejoEscolar();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
