@extends('master')
@section('title','Departamentos')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-elastic.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-underline.css" />
@endsection
@section('content')
    <section>
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">Recursos</h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                </div>
            </div>
            <div class='row text-center g-mb-30'>
                <div class="col-12 text-center px-0">
                    <select class="cs-select cs-skin-underline">
                        <option value="" disabled selected>Selecciona un curso</option>
                        <option value="todos" class="all-select">Todos</option>
                        @foreach($grupos as $g)
                            <option value="{{$g->grupo->id}}">{{$g->grupo->grupo}}</option>
                        @endforeach
                    </select>
                </div>

{{--                <div class="col-sm-3">--}}
{{--                    <h2>{{$g->grupo->grupo}}</h2>--}}
{{--                    <ul>--}}
{{--                        @foreach($g->archivos as $a)--}}
{{--                        <li>Archivo: <a href="{{$a->getUrl()}}">{{explode('_', $a->file_name)[1]}}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
            <div class="row g-mt-40 contenidoDescargable">
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script type="text/javascript" src="/vendor/selectanimate/js/classie.js"></script>
    <script type="text/javascript" src="/vendor/selectanimate/js/selectFx.js"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                new SelectFx(el);
            } );
        })();
        $(document).on('click','.cs-options ul li', function () {
            $.ajax({
                type: 'POST',
                url: '/recursos/curso',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "grupo":$('select.cs-select').val(),
                    "departamento":'{{$grupos->first()->team_id}}'
                },
                success: function(data){
                    if(data != 'FAIL'){
                        $('.contenidoDescargable').empty();
                        for(let x = 0; x < data.length; x++){
                            var nuevoContenido = " <div class='col-lg-4 g-mb-30'>" +
                                "                        <a class='media g-mb-15 cartaDescarga' href='/storage/"+data[x].model_id+"/"+ data[x].file_name+"' download>" +
                                "                            <div class='d-flex align-self-center mr-3'>" +
                                "                                <span class='u-icon-v2 g-color-gray-dark-v4 rounded-circle'>" +
                                "                                    <i class='icon-education-087 u-line-icon-pro'></i>" +
                                "                                </span>" +
                                "                            </div>" +
                                "                            <div class='media-body align-self-center'>" +
                                "                                <h3 class='h5 g-color-black mb-0'>"+data[x].name.split('_').slice(-1).pop()+"</h3>" +
                                "                                <span class='d-block g-color-gray-dark-v4'>Archivo tipo : <b>"+ data[x].file_name.split('.').slice(-1).pop() +"</b></span>" +
                                "                            </div>" +
                                "                        </a>" +
                                "                    </div>";
                            $('.contenidoDescargable').append(nuevoContenido);
                        }
                    }else{
                       console.info('FAIL');
                    }
                }
            });
        });
    </script>
@endsection
