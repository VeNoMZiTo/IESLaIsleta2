@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.departamento.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.departamentos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('departamentos') ? 'has-error' : '' }}">
                <label for="departamentos">{{ trans('cruds.departamento.fields.departamentos') }}*</label>
                <input type="text" id="departamentos" name="departamentos" class="form-control" value="{{ old('departamentos', isset($departamento) ? $departamento->departamentos : '') }}" required>
                @if($errors->has('departamentos'))
                    <p class="help-block">
                        {{ $errors->first('departamentos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.departamento.fields.departamentos_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection