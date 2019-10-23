@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipoDirectivo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.equipo-directivos.update", [$equipoDirectivo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.equipoDirectivo.fields.cargo') }}*</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($equipoDirectivo) ? $equipoDirectivo->cargo : '') }}" required>
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('cruds.equipoDirectivo.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($equipoDirectivo) ? $equipoDirectivo->nombre : '') }}" required>
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.nombre_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('abreviatura_departamento') ? 'has-error' : '' }}">
                <label for="abreviatura_departamento">{{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento') }}*</label>
                <input type="text" id="abreviatura_departamento" name="abreviatura_departamento" class="form-control" value="{{ old('abreviatura_departamento', isset($equipoDirectivo) ? $equipoDirectivo->abreviatura_departamento : '') }}" required>
                @if($errors->has('abreviatura_departamento'))
                    <p class="help-block">
                        {{ $errors->first('abreviatura_departamento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : '' }}">
                <label for="departamento">{{ trans('cruds.equipoDirectivo.fields.departamento') }}*</label>
                <select name="departamento_id" id="departamento" class="form-control select2" required>
                    @foreach($departamentos as $id => $departamento)
                        <option value="{{ $id }}" {{ (isset($equipoDirectivo) && $equipoDirectivo->departamento ? $equipoDirectivo->departamento->id : old('departamento_id')) == $id ? 'selected' : '' }}>{{ $departamento }}</option>
                    @endforeach
                </select>
                @if($errors->has('departamento_id'))
                    <p class="help-block">
                        {{ $errors->first('departamento_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.equipoDirectivo.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($equipoDirectivo) ? $equipoDirectivo->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.email_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection