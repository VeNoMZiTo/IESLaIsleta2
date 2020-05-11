@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.consejoEscolar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.consejo-escolars.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">{{ trans('cruds.consejoEscolar.fields.titulo') }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" id="titulo" value="{{ old('titulo', '') }}">
                @if($errors->has('titulo'))
                    <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.consejoEscolar.fields.titulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitulo">{{ trans('cruds.consejoEscolar.fields.subtitulo') }}</label>
                <input class="form-control {{ $errors->has('subtitulo') ? 'is-invalid' : '' }}" type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo', '') }}">
                @if($errors->has('subtitulo'))
                    <span class="text-danger">{{ $errors->first('subtitulo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.consejoEscolar.fields.subtitulo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="texto">{{ trans('cruds.consejoEscolar.fields.texto') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto') !!}</textarea>
                @if($errors->has('texto'))
                    <span class="text-danger">{{ $errors->first('texto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.consejoEscolar.fields.texto_helper') }}</span>
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
                xhr.open('POST', '/admin/consejo-escolars/ckmedia', true);
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
                data.append('crud_id', {{ $consejoEscolar->id ?? 0 }});
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

@endsection