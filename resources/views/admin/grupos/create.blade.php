@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.grupo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.grupos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('curso_id') ? 'has-error' : '' }}">
                <label for="curso">{{ trans('cruds.grupo.fields.curso') }}*</label>
                <select name="curso_id" id="curso" class="form-control select2" required>
                    @foreach($cursos as $id => $curso)
                        <option value="{{ $id }}" {{ (isset($grupo) && $grupo->curso ? $grupo->curso->id : old('curso_id')) == $id ? 'selected' : '' }}>{{ $curso }}</option>
                    @endforeach
                </select>
                @if($errors->has('curso_id'))
                    <p class="help-block">
                        {{ $errors->first('curso_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection