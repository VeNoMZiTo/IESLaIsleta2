@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.archivosGrupo.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.archivos-grupos.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="grupo_id">{{ trans('cruds.archivosGrupo.fields.grupo') }}</label>
                    <select class="form-control select2 {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo_id" id="grupo_id" required>
                        @foreach($grupos as $id => $grupo)
                            @if(empty($filtro->where('grupo_id','=',$id)->first()))
                                <option value="{{ $id }}" {{ old('grupo_id') == $id ? 'selected' : '' }}>{{ $grupo }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('grupo'))
                        <span class="text-danger">{{ $errors->first('grupo') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.archivosGrupo.fields.grupo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="archivos">{{ trans('cruds.archivosGrupo.fields.archivos') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('archivos') ? 'is-invalid' : '' }}" id="archivos-dropzone">
                    </div>
                    @if($errors->has('archivos'))
                        <span class="text-danger">{{ $errors->first('archivos') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.archivosGrupo.fields.archivos_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="texto">{{ trans('cruds.archivosGrupo.fields.texto') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('texto') ? 'is-invalid' : '' }}" name="texto" id="texto">{!! old('texto') !!}</textarea>
                    @if($errors->has('texto'))
                        <span class="text-danger">{{ $errors->first('texto') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.archivosGrupo.fields.texto_helper') }}</span>
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
        var uploadedArchivosMap = {}
        Dropzone.options.archivosDropzone = {
            url: '{{ route('admin.archivos-grupos.storeMedia') }}',
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
                    @if(isset($archivosGrupo) && $archivosGrupo->archivos)
                var files =
                {!! json_encode($archivosGrupo->archivos) !!}
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
                                        xhr.open('POST', '/admin/archivos-grupos/ckmedia', true);
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
                                        data.append('crud_id', {{ $archivosGrupo->id ?? 0 }});
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
