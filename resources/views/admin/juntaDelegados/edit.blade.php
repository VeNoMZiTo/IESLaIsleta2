@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.juntaDelegado.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.junta-delegados.update", [$juntaDelegado->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="titulo">{{ trans('cruds.juntaDelegado.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', $juntaDelegado->titulo) }}" required>
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.juntaDelegado.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitulo">{{ trans('cruds.juntaDelegado.fields.subtitulo') }}</label>
                <input class="form-control {{ $errors->has('subtitulo') ? 'is-invalid' : '' }}" type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo', $juntaDelegado->subtitulo) }}">
                @if($errors->has('subtitulo'))
                    <span class="text-danger">{{ $errors->first('subtitulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.juntaDelegado.fields.subtitulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.juntaDelegado.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto', $juntaDelegado->texto) !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.juntaDelegado.fields.texto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imagen">{{ trans('cruds.juntaDelegado.fields.imagen') }}</label>
                <div class="needsclick dropzone {{ $errors->has('imagen') ? 'is-invalid' : '' }}" id="imagen-dropzone">
                </div>
                @if($errors->has('imagen'))
                    <span class="text-danger">{{ $errors->first('imagen') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.juntaDelegado.fields.imagen_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/junta-delegados/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $juntaDelegado->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.imagenDropzone = {
    url: '{{ route('admin.junta-delegados.storeMedia') }}',
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
      $('form').find('input[name="imagen"]').remove()
      $('form').append('<input type="hidden" name="imagen" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="imagen"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($juntaDelegado) && $juntaDelegado->imagen)
      var file = {!! json_encode($juntaDelegado->imagen) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $juntaDelegado->imagen->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="imagen" value="' + file.file_name + '">')
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
@endsection