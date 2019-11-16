@extends('master')
@section('title','Tutorías')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-elastic.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-underline.css" />
@endsection
@section('content')
    @php
    @endphp
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black mb-4">Tutorías</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row g-mb-30">
                <div class="col-12 text-center px-0">
                    <select class="cs-select cs-skin-underline">
                        <option value="" disabled selected>Selecciona un curso</option>
                        <option value="todos" class="all-select">Todos</option>
                        @foreach($tutoria as $curso)
                        <option value="{{$curso->nivel}} {{$curso->grupo}}">{{$curso->nivel}} - {{$curso->grupo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    @if($descargar)
                    <div class="panel-descarga">
                        <ul class="list-unstyled objetos-panel">
                            <li>
                                <a class="download tooltipster" title="Descargar" href="{{$descargar->tutoria->getUrl()}}" download><i class="fa fa-download"></i></a>
                            </li>
                            <li>
                                <a class="downloand-print tooltipster" title="Imprimir" href="{{$descargar->tutoria->getUrl()}}"><i class="fa fa-print"></i></a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="tabla ver3 m-b-110">
                        <div class="tabla-head">
                            <table>
                                <thead>
                                <tr class="row100 head g-bg-primary">
                                    <th class="columnas column1">Nivel</th>
                                    <th class="columnas column2">Grupo</th>
                                    <th class="columnas column3">Tutor/tutora</th>
                                    <th class="columnas column4">Departamento</th>
                                    <th class="columnas column5">Correo Electrónico</th>
                                    <th class="columnas column6">Hora de Atención</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tabla-body js-pscroll">
                            <table>
                                <tbody>
                                @foreach($tutoria as $t)
                                <tr class="row100 body">
                                    <td data-column="Nivel" class="columnas column1">
                                        <p>
                                            {{$t->nivel}}
                                        </p>
                                    </td>
                                    <td data-column="Grupo" class="columnas column2">
                                        <p>
                                            {{$t->grupo}}
                                        </p>
                                    </td>
                                    <td data-column="Tutor/Tutora" class="columnas column3">
                                        <p>
                                            {{$t->tutor}}
                                        </p>
                                    </td>
                                    <td data-column="Departamento" class="columnas column4 tooltipster" title="{{$t->departamento->nombre}}">
                                        <p>
                                            {{$t->abreviatura_departamento}}
                                        </p>
                                    </td>
                                    <td data-column="Correo Electrónico" class="columnas column5">
                                        <p>
                                            {{$t->email}}
                                        </p>
                                    </td>
                                    <td data-column="Hora de Atención" class="columnas column6">
                                        <p>
                                            {{$t->hora_atencion}}
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript" src="/vendor/selectanimate/js/classie.js"></script>
    <script type="text/javascript" src="/vendor/selectanimate/js/selectFx.js"></script>
    <script type="text/javascript" src="/vendor/tooltipster-master/js/tooltipster.bundle.min.js"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                new SelectFx(el);
            } );
        })();
        $(document).ready(function() {
            $(document).on('click','.cs-options ul li', function () {
               var grupo=$(this).attr('data-value').split(' ');
               var nivel=grupo[1];
               grupo=grupo[0];
               console.log(grupo);
               $('li[data-value=todos]').delay(1000).show(100);
               if(grupo!='todos'){
                   for(var x=1; x<$('.column2').length; x++){
                       if($('.column2').eq(x).children().text().trim()==nivel && $('.column2').eq(x).siblings('.column1').children().text().trim()==grupo){
                           $('.column2').eq(x).parent('.row100').show();
                       }else{
                           $('.column2').eq(x).parent('.row100').hide();
                       }
                   }
               }else{
                   $('.column2').parent('.row100').show();
               }

            });
            $('tbody tr').mouseover(function () {
                $('tbody tr').not($(this)).css({
                    filter:'blur(4px)'
                });
            });
            $('tbody tr').mouseout(function () {
                $('tbody tr').css({
                    filter:'blur(0px)'
                });
            });
            $('.tooltipster').tooltipster({
                theme: 'tooltipster-shadow'
            });

        });
    </script>
@endsection