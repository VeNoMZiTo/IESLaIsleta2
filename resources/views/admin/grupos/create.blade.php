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
                <label class="required" for="curso">{{ trans('cruds.grupo.fields.curso') }}</label>
                <input class="form-control {{ $errors->has('curso') ? 'is-invalid' : '' }}" type="text" name="curso" id="curso" value="{{ old('curso', '') }}" required>
                @if($errors->has('curso'))
                    <span class="text-danger">{{ $errors->first('curso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.grupo.fields.curso_helper') }}</span>
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