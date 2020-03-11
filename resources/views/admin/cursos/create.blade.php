@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.curso.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cursos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.curso.fields.nivel') }}</label>
                <select class="form-control {{ $errors->has('nivel') ? 'is-invalid' : '' }}" name="nivel" id="nivel" required>
                    <option value disabled {{ old('nivel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Curso::NIVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nivel', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nivel'))
                    <span class="text-danger">{{ $errors->first('nivel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.curso.fields.nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.curso.fields.curso') }}</label>
                <select class="form-control {{ $errors->has('curso') ? 'is-invalid' : '' }}" name="curso" id="curso" required>
                    <option value disabled {{ old('curso', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Curso::CURSO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('curso', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('curso'))
                    <span class="text-danger">{{ $errors->first('curso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.curso.fields.curso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asignatura_id">{{ trans('cruds.curso.fields.asignatura') }}</label>
                <select class="form-control select2 {{ $errors->has('asignatura') ? 'is-invalid' : '' }}" name="asignatura_id" id="asignatura_id" required>
                    @foreach($asignaturas as $id => $asignatura)
                        <option value="{{ $id }}" {{ old('asignatura_id') == $id ? 'selected' : '' }}>{{ $asignatura }}</option>
                    @endforeach
                </select>
                @if($errors->has('asignatura'))
                    <span class="text-danger">{{ $errors->first('asignatura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.curso.fields.asignatura_helper') }}</span>
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