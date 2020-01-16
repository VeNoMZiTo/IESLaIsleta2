@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.citaPrevium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cita-previa.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="asignatura_id">{{ trans('cruds.citaPrevium.fields.asignatura') }}</label>
                <select class="form-control select2 {{ $errors->has('asignatura') ? 'is-invalid' : '' }}" name="asignatura_id" id="asignatura_id" required>
                    @foreach($asignaturas as $id => $asignatura)
                        <option value="{{ $id }}" {{ old('asignatura_id') == $id ? 'selected' : '' }}>{{ $asignatura }}</option>
                    @endforeach
                </select>
                @if($errors->has('asignatura_id'))
                    <span class="text-danger">{{ $errors->first('asignatura_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.citaPrevium.fields.asignatura_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="curso_id">{{ trans('cruds.citaPrevium.fields.curso') }}</label>
                <select class="form-control select2 {{ $errors->has('curso') ? 'is-invalid' : '' }}" name="curso_id" id="curso_id" required>
                    @foreach($cursos as $id => $curso)
                        <option value="{{ $id }}" {{ old('curso_id') == $id ? 'selected' : '' }}>{{ $curso }}</option>
                    @endforeach
                </select>
                @if($errors->has('curso_id'))
                    <span class="text-danger">{{ $errors->first('curso_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.citaPrevium.fields.curso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha">{{ trans('cruds.citaPrevium.fields.fecha') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                @if($errors->has('fecha'))
                    <span class="text-danger">{{ $errors->first('fecha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.citaPrevium.fields.fecha_helper') }}</span>
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