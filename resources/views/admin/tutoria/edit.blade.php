@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tutorium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tutoria.update", [$tutorium->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
                <label for="nivel">{{ trans('cruds.tutorium.fields.nivel') }}*</label>
                <input type="text" id="nivel" name="nivel" class="form-control" value="{{ old('nivel', isset($tutorium) ? $tutorium->nivel : '') }}" required>
                @if($errors->has('nivel'))
                    <p class="help-block">
                        {{ $errors->first('nivel') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.nivel_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('grupo') ? 'has-error' : '' }}">
                <label for="grupo">{{ trans('cruds.tutorium.fields.grupo') }}*</label>
                <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', isset($tutorium) ? $tutorium->grupo : '') }}" required>
                @if($errors->has('grupo'))
                    <p class="help-block">
                        {{ $errors->first('grupo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.grupo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tutor') ? 'has-error' : '' }}">
                <label for="tutor">{{ trans('cruds.tutorium.fields.tutor') }}*</label>
                <input type="text" id="tutor" name="tutor" class="form-control" value="{{ old('tutor', isset($tutorium) ? $tutorium->tutor : '') }}" required>
                @if($errors->has('tutor'))
                    <p class="help-block">
                        {{ $errors->first('tutor') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.tutor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('abreviatura_departamento') ? 'has-error' : '' }}">
                <label for="abreviatura_departamento">{{ trans('cruds.tutorium.fields.abreviatura_departamento') }}*</label>
                <input type="text" id="abreviatura_departamento" name="abreviatura_departamento" class="form-control" value="{{ old('abreviatura_departamento', isset($tutorium) ? $tutorium->abreviatura_departamento : '') }}" required>
                @if($errors->has('abreviatura_departamento'))
                    <p class="help-block">
                        {{ $errors->first('abreviatura_departamento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.abreviatura_departamento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.tutorium.fields.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($tutorium) ? $tutorium->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hora_atencion') ? 'has-error' : '' }}">
                <label for="hora_atencion">{{ trans('cruds.tutorium.fields.hora_atencion') }}*</label>
                <input type="text" id="hora_atencion" name="hora_atencion" class="form-control" value="{{ old('hora_atencion', isset($tutorium) ? $tutorium->hora_atencion : '') }}" required>
                @if($errors->has('hora_atencion'))
                    <p class="help-block">
                        {{ $errors->first('hora_atencion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.hora_atencion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : '' }}">
                <label for="departamento">{{ trans('cruds.tutorium.fields.departamento') }}*</label>
                <select name="departamento_id" id="departamento" class="form-control select2" required>
                    @foreach($departamentos as $id => $departamento)
                        <option value="{{ $id }}" {{ (isset($tutorium) && $tutorium->departamento ? $tutorium->departamento->id : old('departamento_id')) == $id ? 'selected' : '' }}>{{ $departamento }}</option>
                    @endforeach
                </select>
                @if($errors->has('departamento_id'))
                    <p class="help-block">
                        {{ $errors->first('departamento_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('descarga') ? 'has-error' : '' }}">
                <label for="descarga">{{ trans('cruds.tutorium.fields.descarga') }}</label>
                <div class="needsclick dropzone" id="descarga-dropzone">

                </div>
                @if($errors->has('descarga'))
                    <p class="help-block">
                        {{ $errors->first('descarga') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tutorium.fields.descarga_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.descargaDropzone = {
    url: '{{ route('admin.tutoria.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="descarga"]').remove()
      $('form').append('<input type="hidden" name="descarga" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="descarga"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($tutorium) && $tutorium->descarga)
      var file = {!! json_encode($tutorium->descarga) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="descarga" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop