@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.noticium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.noticia.update", [$noticium->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                <label for="titulo">{{ trans('cruds.noticium.fields.titulo') }}*</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', isset($noticium) ? $noticium->titulo : '') }}" required>
                @if($errors->has('titulo'))
                    <p class="help-block">
                        {{ $errors->first('titulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.titulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('subtitulo') ? 'has-error' : '' }}">
                <label for="subtitulo">{{ trans('cruds.noticium.fields.subtitulo') }}</label>
                <input type="text" id="subtitulo" name="subtitulo" class="form-control" value="{{ old('subtitulo', isset($noticium) ? $noticium->subtitulo : '') }}">
                @if($errors->has('subtitulo'))
                    <p class="help-block">
                        {{ $errors->first('subtitulo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.subtitulo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="fecha">{{ trans('cruds.noticium.fields.fecha') }}*</label>
                <input type="text" id="fecha" name="fecha" class="form-control date" value="{{ old('fecha', isset($noticium) ? $noticium->fecha : '') }}" required>
                @if($errors->has('fecha'))
                    <p class="help-block">
                        {{ $errors->first('fecha') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.fecha_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('autor') ? 'has-error' : '' }}">
                <label for="autor">{{ trans('cruds.noticium.fields.autor') }}*</label>
                <input type="text" id="autor" name="autor" class="form-control" value="{{ old('autor', isset($noticium) ? $noticium->autor : '') }}" required>
                @if($errors->has('autor'))
                    <p class="help-block">
                        {{ $errors->first('autor') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.autor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="foto">{{ trans('cruds.noticium.fields.foto') }}*</label>
                <div class="needsclick dropzone" id="foto-dropzone">

                </div>
                @if($errors->has('foto'))
                    <p class="help-block">
                        {{ $errors->first('foto') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.foto_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.noticium.fields.descripcion') }}*</label>
                <textarea id="descripcion" name="descripcion" class="form-control ckeditor">{{ old('descripcion', isset($noticium) ? $noticium->descripcion : '') }}</textarea>
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.descripcion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('archivos') ? 'has-error' : '' }}">
                <label for="archivos">{{ trans('cruds.noticium.fields.archivos') }}</label>
                <div class="needsclick dropzone" id="archivos-dropzone">

                </div>
                @if($errors->has('archivos'))
                    <p class="help-block">
                        {{ $errors->first('archivos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.noticium.fields.archivos_helper') }}
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
    url: '{{ route('admin.noticia.storeMedia') }}',
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
@if(isset($noticium) && $noticium->foto)
      var files =
        {!! json_encode($noticium->foto) !!}
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
<script>
    var uploadedArchivosMap = {}
Dropzone.options.archivosDropzone = {
    url: '{{ route('admin.noticia.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="archivos[]" value="' + response.name + '">')
      uploadedArchivosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedArchivosMap[file.name]
      }
      $('form').find('input[name="archivos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($noticium) && $noticium->archivos)
          var files =
            {!! json_encode($noticium->archivos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="archivos[]" value="' + file.file_name + '">')
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