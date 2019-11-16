@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.grupo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.grupos.update", [$grupo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('curso') ? 'has-error' : '' }}">
                <label for="curso">{{ trans('cruds.grupo.fields.curso') }}*</label>
                <input type="text" id="curso" name="curso" class="form-control" value="{{ old('curso', isset($grupo) ? $grupo->curso : '') }}" required>
                @if($errors->has('curso'))
                    <p class="help-block">
                        {{ $errors->first('curso') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.grupo.fields.curso_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection