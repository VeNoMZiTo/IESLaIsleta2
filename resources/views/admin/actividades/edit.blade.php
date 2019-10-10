@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.actividade.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.actividades.update", [$actividade->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.actividade.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($actividade) ? $actividade->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actividade.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="fecha">{{ trans('cruds.actividade.fields.fecha') }}*</label>
                <input type="text" id="fecha" name="fecha" class="form-control date" value="{{ old('fecha', isset($actividade) ? $actividade->fecha : '') }}" required>
                @if($errors->has('fecha'))
                    <p class="help-block">
                        {{ $errors->first('fecha') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actividade.fields.fecha_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="foto">{{ trans('cruds.actividade.fields.foto') }}*</label>
                <div class="needsclick dropzone" id="foto-dropzone">

                </div>
                @if($errors->has('foto'))
                    <p class="help-block">
                        {{ $errors->first('foto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actividade.fields.foto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('autor') ? 'has-error' : '' }}">
                <label for="autor">{{ trans('cruds.actividade.fields.autor') }}*</label>
                <input type="text" id="autor" name="autor" class="form-control" value="{{ old('autor', isset($actividade) ? $actividade->autor : '') }}" required>
                @if($errors->has('autor'))
                    <p class="help-block">
                        {{ $errors->first('autor') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actividade.fields.autor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.actividade.fields.descripcion') }}*</label>
                <textarea id="descripcion" name="descripcion" class="form-control ckeditor">{{ old('descripcion', isset($actividade) ? $actividade->descripcion : '') }}</textarea>
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actividade.fields.descripcion_helper') }}
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
    var uploadedFotoMap = {}
Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.actividades.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
      uploadedFotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFotoMap[file.name]
      }
      $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($actividade) && $actividade->foto)
      var files =
        {!! json_encode($actividade->foto) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="foto[]" value="' + file.file_name + '">')
        }
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