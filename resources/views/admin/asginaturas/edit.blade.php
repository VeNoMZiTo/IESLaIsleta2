@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.asginatura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asginaturas.update", [$asginatura->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.asginatura.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $asginatura->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asginatura.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cursos">{{ trans('cruds.asginatura.fields.cursos') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('cursos') ? 'is-invalid' : '' }}" name="cursos[]" id="cursos" multiple required>
                    @foreach($cursos as $id => $cursos)
                        <option value="{{ $id }}" {{ (in_array($id, old('cursos', [])) || $asginatura->cursos->contains($id)) ? 'selected' : '' }}>{{ $cursos }}</option>
                    @endforeach
                </select>
                @if($errors->has('cursos'))
                    <span class="text-danger">{{ $errors->first('cursos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asginatura.fields.cursos_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection