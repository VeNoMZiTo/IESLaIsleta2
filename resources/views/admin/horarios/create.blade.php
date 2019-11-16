@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.horario.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.horarios.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('horario') ? 'has-error' : '' }}">
                <label for="horario">{{ trans('cruds.horario.fields.horario') }}*</label>
                <select id="horario" name="horario" class="form-control" required>
                    <option value="" disabled {{ old('horario', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Horario::HORARIO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('horario', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('horario'))
                    <p class="help-block">
                        {{ $errors->first('horario') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('dia') ? 'has-error' : '' }}">
                <label for="dia">{{ trans('cruds.horario.fields.dia') }}*</label>
                <select id="dia" name="dia" class="form-control" required>
                    <option value="" disabled {{ old('dia', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Horario::DIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dia', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dia'))
                    <p class="help-block">
                        {{ $errors->first('dia') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('curso') ? 'has-error' : '' }}">
                <label for="curso">{{ trans('cruds.horario.fields.curso') }}*</label>
                <input type="text" id="curso" name="curso" class="form-control" value="{{ old('curso', isset($horario) ? $horario->curso : '') }}" required>
                @if($errors->has('curso'))
                    <p class="help-block">
                        {{ $errors->first('curso') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.horario.fields.curso_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('asignatura') ? 'has-error' : '' }}">
                <label for="asignatura">{{ trans('cruds.horario.fields.asignatura') }}*</label>
                <input type="text" id="asignatura" name="asignatura" class="form-control" value="{{ old('asignatura', isset($horario) ? $horario->asignatura : '') }}" required>
                @if($errors->has('asignatura'))
                    <p class="help-block">
                        {{ $errors->first('asignatura') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.horario.fields.asignatura_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                <label for="color">{{ trans('cruds.horario.fields.color') }}*</label>
                <input type="text" id="color" name="color" class="form-control" value="{{ old('color', isset($horario) ? $horario->color : '') }}" required>
                @if($errors->has('color'))
                    <p class="help-block">
                        {{ $errors->first('color') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.horario.fields.color_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection