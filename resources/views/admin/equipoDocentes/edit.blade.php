@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.equipoDocente.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.equipo-docentes.update", [$equipoDocente->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
                <label for="departamento">{{ trans('cruds.equipoDocente.fields.departamento') }}*</label>
                <input type="text" id="departamento" name="departamento" class="form-control" value="{{ old('departamento', isset($equipoDocente) ? $equipoDocente->departamento : '') }}" required>
                @if($errors->has('departamento'))
                    <p class="help-block">
                        {{ $errors->first('departamento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.departamento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('profesores') ? 'has-error' : '' }}">
                <label for="profesores">{{ trans('cruds.equipoDocente.fields.profesores') }}*</label>
                <input type="text" id="profesores" name="profesores" class="form-control" value="{{ old('profesores', isset($equipoDocente) ? $equipoDocente->profesores : '') }}" required>
                @if($errors->has('profesores'))
                    <p class="help-block">
                        {{ $errors->first('profesores') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.profesores_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.equipoDocente.fields.cargo') }}*</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($equipoDocente) ? $equipoDocente->cargo : '') }}" required>
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.equipoDocente.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($equipoDocente) ? $equipoDocente->email : '') }}" required>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('imprimir') ? 'has-error' : '' }}">
                <label for="imprimir">{{ trans('cruds.equipoDocente.fields.imprimir') }}</label>
                <div class="needsclick dropzone" id="imprimir-dropzone">

                </div>
                @if($errors->has('imprimir'))
                    <p class="help-block">
                        {{ $errors->first('imprimir') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.equipoDocente.fields.imprimir_helper') }}
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
    Dropzone.options.imprimirDropzone = {
    url: '{{ route('admin.equipo-docentes.storeMedia') }}',
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
      $('form').find('input[name="imprimir"]').remove()
      $('form').append('<input type="hidden" name="imprimir" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="imprimir"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($equipoDocente) && $equipoDocente->imprimir)
      var file = {!! json_encode($equipoDocente->imprimir) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="imprimir" value="' + file.file_name + '">')
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