@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.informacion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.informacions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="subtitulo">{{ trans('cruds.informacion.fields.subtitulo') }}</label>
                <textarea class="form-control {{ $errors->has('subtitulo') ? 'is-invalid' : '' }}" name="subtitulo" id="subtitulo">{{ old('subtitulo') }}</textarea>
                @if($errors->has('subtitulo'))
                    <span class="text-danger">{{ $errors->first('subtitulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacion.fields.subtitulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.informacion.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto') !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacion.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="foto">{{ trans('cruds.informacion.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacion.fields.foto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="archivos">{{ trans('cruds.informacion.fields.archivos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('archivos') ? 'is-invalid' : '' }}" id="archivos-dropzone">
                </div>
                @if($errors->has('archivos'))
                    <span class="text-danger">{{ $errors->first('archivos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.informacion.fields.archivos_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.informacions.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 2000,
      height: 2000
    },
    success: function (file, response) {
      $('form').find('input[name="foto"]').remove()
      $('form').append('<input type="hidden" name="foto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($informacion) && $informacion->foto)
      var file = {!! json_encode($informacion->foto) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $informacion->foto->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto" value="' + file.file_name + '">')
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
<script>
    var uploadedArchivosMap = {}
Dropzone.options.archivosDropzone = {
    url: '{{ route('admin.informacions.storeMedia') }}',
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
@if(isset($informacion) && $informacion->archivos)
          var files =
            {!! json_encode($informacion->archivos) !!}
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
@endsection