@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipoDirectivo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.equipo-directivos.update", [$equipoDirectivo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cargo">{{ trans('cruds.equipoDirectivo.fields.cargo') }}</label>
                <input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" id="cargo" value="{{ old('cargo', $equipoDirectivo->cargo) }}" required>
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDirectivo.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.equipoDirectivo.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $equipoDirectivo->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDirectivo.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="abreviatura_departamento">{{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento') }}</label>
                <input class="form-control {{ $errors->has('abreviatura_departamento') ? 'is-invalid' : '' }}" type="text" name="abreviatura_departamento" id="abreviatura_departamento" value="{{ old('abreviatura_departamento', $equipoDirectivo->abreviatura_departamento) }}" required>
                @if($errors->has('abreviatura_departamento'))
                    <span class="text-danger">{{ $errors->first('abreviatura_departamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.equipoDirectivo.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $equipoDirectivo->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.equipoDirectivo.fields.email_helper') }}</span>
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