@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipoDocente.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.equipo-docentes.update", [$equipoDocente->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : '' }}">
                <label for="departamento">{{ trans('cruds.equipoDocente.fields.departamento') }}*</label>
                <select name="departamento_id" id="departamento" class="form-control select2" required>
                    @foreach($departamentos as $id => $departamento)
                        <option value="{{ $id }}" {{ (isset($equipoDocente) && $equipoDocente->departamento ? $equipoDocente->departamento->id : old('departamento_id')) == $id ? 'selected' : '' }}>{{ $departamento }}</option>
                    @endforeach
                </select>
                @if($errors->has('departamento_id'))
                    <p class="help-block">
                        {{ $errors->first('departamento_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('profesores') ? 'has-error' : '' }}">
                <label for="profesores">{{ trans('cruds.equipoDocente.fields.profesores') }}*</label>
                <input type="text" id="profesores" name="profesores" class="form-control" value="{{ old('profesores', isset($equipoDocente) ? $equipoDocente->profesores : '') }}" required>
                @if($errors->has('profesores'))
                    <p class="help-block">
                        {{ $errors->first('profesores') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.profesores_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.equipoDocente.fields.cargo') }}</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($equipoDocente) ? $equipoDocente->cargo : '') }}">
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.equipoDocente.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($equipoDocente) ? $equipoDocente->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.email_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection