@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipoDocente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.equipo-docentes.update", [$equipoDocente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="profesores">{{ trans('cruds.equipoDocente.fields.profesores') }}</label>
                <input class="form-control {{ $errors->has('profesores') ? 'is-invalid' : '' }}" type="text" name="profesores" id="profesores" value="{{ old('profesores', $equipoDocente->profesores) }}" required>
                @if($errors->has('profesores'))
                    <span class="text-danger">{{ $errors->first('profesores') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDocente.fields.profesores_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cargo">{{ trans('cruds.equipoDocente.fields.cargo') }}</label>
                <input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" id="cargo" value="{{ old('cargo', $equipoDocente->cargo) }}">
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDocente.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.equipoDocente.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $equipoDocente->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDocente.fields.email_helper') }}</span>
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