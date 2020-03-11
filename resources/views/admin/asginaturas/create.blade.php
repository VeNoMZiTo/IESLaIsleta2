@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.asginatura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asginaturas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="asginaturas">{{ trans('cruds.asginatura.fields.asginaturas') }}</label>
                <input class="form-control {{ $errors->has('asginaturas') ? 'is-invalid' : '' }}" type="text" name="asginaturas" id="asginaturas" value="{{ old('asginaturas', '') }}" required>
                @if($errors->has('asginaturas'))
                    <span class="text-danger">{{ $errors->first('asginaturas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asginatura.fields.asginaturas_helper') }}</span>
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