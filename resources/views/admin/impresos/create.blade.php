@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.impreso.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.impresos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('cruds.impreso.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($impreso) ? $impreso->nombre : '') }}" required>
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.impreso.fields.nombre_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('archivo') ? 'has-error' : '' }}">
                <label for="archivo">{{ trans('cruds.impreso.fields.archivo') }}*</label>
                <div class="needsclick dropzone" id="archivo-dropzone">

                </div>
                @if($errors->has('archivo'))
                    <p class="help-block">
                        {{ $errors->first('archivo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.impreso.fields.archivo_helper') }}
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
    var uploadedArchivoMap = {}
Dropzone.options.archivoDropzone = {
    url: '{{ route('admin.impresos.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="archivo[]" value="' + response.name + '">')
      uploadedArchivoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedArchivoMap[file.name]
      }
      $('form').find('input[name="archivo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($impreso) && $impreso->archivo)
          var files =
            {!! json_encode($impreso->archivo) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="archivo[]" value="' + file.file_name + '">')
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