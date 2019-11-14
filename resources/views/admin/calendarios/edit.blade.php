@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.calendario.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.calendarios.update", [$calendario->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label for="tipo">{{ trans('cruds.calendario.fields.tipo') }}*</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="" disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Calendario::TIPO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo', $calendario->tipo) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo'))
                    <p class="help-block">
                        {{ $errors->first('tipo') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tema') ? 'has-error' : '' }}">
                <label for="tema">{{ trans('cruds.calendario.fields.tema') }}*</label>
                <input type="text" id="tema" name="tema" class="form-control" value="{{ old('tema', isset($calendario) ? $calendario->tema : '') }}" required>
                @if($errors->has('tema'))
                    <p class="help-block">
                        {{ $errors->first('tema') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.calendario.fields.tema_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="fecha">{{ trans('cruds.calendario.fields.fecha') }}*</label>
                <input type="text" id="fecha" name="fecha" class="form-control date" value="{{ old('fecha', isset($calendario) ? $calendario->fecha : '') }}" required>
                @if($errors->has('fecha'))
                    <p class="help-block">
                        {{ $errors->first('fecha') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.calendario.fields.fecha_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection