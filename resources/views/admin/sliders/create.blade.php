@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sliders.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.slider.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($slider) ? $slider->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.slider.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($slider) ? $slider->descripcion : '') }}" required>
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.descripcion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('boton') ? 'has-error' : '' }}">
                <label for="boton">{{ trans('cruds.slider.fields.boton') }}</label>
                <input type="text" id="boton" name="boton" class="form-control" value="{{ old('boton', isset($slider) ? $slider->boton : '') }}">
                @if($errors->has('boton'))
                    <p class="help-block">
                        {{ $errors->first('boton') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.slider.fields.boton_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection