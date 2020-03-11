@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.horario.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.horarios.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="grupo_id">{{ trans('cruds.horario.fields.grupo') }}</label>
                <select class="form-control select2 {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo_id" id="grupo_id" required>
                    @foreach($grupos as $id => $grupo)
                        <option value="{{ $id }}" {{ old('grupo_id') == $id ? 'selected' : '' }}>{{ $grupo }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo'))
                    <span class="text-danger">{{ $errors->first('grupo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.horario.fields.horario') }}</label>
                <select class="form-control {{ $errors->has('horario') ? 'is-invalid' : '' }}" name="horario" id="horario" required>
                    <option value disabled {{ old('horario', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Horario::HORARIO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('horario', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <span class="text-danger">{{ $errors->first('horario') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.horario_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.horario.fields.dia') }}</label>
                <select class="form-control {{ $errors->has('dia') ? 'is-invalid' : '' }}" name="dia" id="dia" required>
                    <option value disabled {{ old('dia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Horario::DIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dia', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dia'))
                    <span class="text-danger">{{ $errors->first('dia') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.dia_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asignatura">{{ trans('cruds.horario.fields.asignatura') }}</label>
                <input class="form-control {{ $errors->has('asignatura') ? 'is-invalid' : '' }}" type="text" name="asignatura" id="asignatura" value="{{ old('asignatura', '') }}" required>
                @if($errors->has('asignatura'))
                    <span class="text-danger">{{ $errors->first('asignatura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.asignatura_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="color">{{ trans('cruds.horario.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', '') }}" required>
                @if($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.horario.fields.color_helper') }}</span>
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