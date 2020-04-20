@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.grupo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.grupos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="grupo">{{ trans('cruds.grupo.fields.grupo') }}</label>
                <input class="form-control {{ $errors->has('grupo') ? 'is-invalid' : '' }}" type="text" name="grupo" id="grupo" value="{{ old('grupo', '') }}" required>
                @if($errors->has('grupo'))
                    <span class="text-danger">{{ $errors->first('grupo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.grupo.fields.grupo_helper') }}</span>
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