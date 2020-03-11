@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tutorium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tutoria.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nivel">{{ trans('cruds.tutorium.fields.nivel') }}</label>
                <input class="form-control {{ $errors->has('nivel') ? 'is-invalid' : '' }}" type="text" name="nivel" id="nivel" value="{{ old('nivel', '') }}" required>
                @if($errors->has('nivel'))
                    <span class="text-danger">{{ $errors->first('nivel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.nivel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="grupo">{{ trans('cruds.tutorium.fields.grupo') }}</label>
                <input class="form-control {{ $errors->has('grupo') ? 'is-invalid' : '' }}" type="text" name="grupo" id="grupo" value="{{ old('grupo', '') }}" required>
                @if($errors->has('grupo'))
                    <span class="text-danger">{{ $errors->first('grupo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.grupo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tutor">{{ trans('cruds.tutorium.fields.tutor') }}</label>
                <input class="form-control {{ $errors->has('tutor') ? 'is-invalid' : '' }}" type="text" name="tutor" id="tutor" value="{{ old('tutor', '') }}" required>
                @if($errors->has('tutor'))
                    <span class="text-danger">{{ $errors->first('tutor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.tutor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="abreviatura_departamento">{{ trans('cruds.tutorium.fields.abreviatura_departamento') }}</label>
                <input class="form-control {{ $errors->has('abreviatura_departamento') ? 'is-invalid' : '' }}" type="text" name="abreviatura_departamento" id="abreviatura_departamento" value="{{ old('abreviatura_departamento', '') }}" required>
                @if($errors->has('abreviatura_departamento'))
                    <span class="text-danger">{{ $errors->first('abreviatura_departamento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.abreviatura_departamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.tutorium.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hora_atencion">{{ trans('cruds.tutorium.fields.hora_atencion') }}</label>
                <input class="form-control {{ $errors->has('hora_atencion') ? 'is-invalid' : '' }}" type="text" name="hora_atencion" id="hora_atencion" value="{{ old('hora_atencion', '') }}" required>
                @if($errors->has('hora_atencion'))
                    <span class="text-danger">{{ $errors->first('hora_atencion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tutorium.fields.hora_atencion_helper') }}</span>
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