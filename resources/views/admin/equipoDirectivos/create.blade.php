@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.equipoDirectivo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.equipo-directivos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.equipoDirectivo.fields.cargo') }}*</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($equipoDirectivo) ? $equipoDirectivo->cargo : '') }}" required>
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('cruds.equipoDirectivo.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($equipoDirectivo) ? $equipoDirectivo->nombre : '') }}" required>
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.nombre_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('abreviatura_departamento') ? 'has-error' : '' }}">
                <label for="abreviatura_departamento">{{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento') }}*</label>
                <input type="text" id="abreviatura_departamento" name="abreviatura_departamento" class="form-control" value="{{ old('abreviatura_departamento', isset($equipoDirectivo) ? $equipoDirectivo->abreviatura_departamento : '') }}" required>
                @if($errors->has('abreviatura_departamento'))
                    <p class="help-block">
                        {{ $errors->first('abreviatura_departamento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.abreviatura_departamento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.equipoDirectivo.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($equipoDirectivo) ? $equipoDirectivo->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('departamento_id') ? 'has-error' : '' }}">
                <label for="departamento">{{ trans('cruds.equipoDirectivo.fields.departamento') }}*</label>
                <select name="departamento_id" id="departamento" class="form-control select2" required>
                    @foreach($departamentos as $id => $departamento)
                        <option value="{{ $id }}" {{ (isset($equipoDirectivo) && $equipoDirectivo->departamento ? $equipoDirectivo->departamento->id : old('departamento_id')) == $id ? 'selected' : '' }}>{{ $departamento }}</option>
                    @endforeach
                </select>
                @if($errors->has('departamento_id'))
                    <p class="help-block">
                        {{ $errors->first('departamento_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('descargar') ? 'has-error' : '' }}">
                <label for="descargar">{{ trans('cruds.equipoDirectivo.fields.descargar') }}</label>
                <div class="needsclick dropzone" id="descargar-dropzone">

                </div>
                @if($errors->has('descargar'))
                    <p class="help-block">
                        {{ $errors->first('descargar') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDirectivo.fields.descargar_helper') }}
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
    Dropzone.options.descargarDropzone = {
    url: '{{ route('admin.equipo-directivos.storeMedia') }}',
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
      $('form').find('input[name="descargar"]').remove()
      $('form').append('<input type="hidden" name="descargar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="descargar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($equipoDirectivo) && $equipoDirectivo->descargar)
      var file = {!! json_encode($equipoDirectivo->descargar) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="descargar" value="' + file.file_name + '">')
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