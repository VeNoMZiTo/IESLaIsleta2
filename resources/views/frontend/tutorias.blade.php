@extends('master')
@section('title','Tutorías')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-elastic.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/selectanimate/css/cs-skin-underline.css" />
    <style>
        .cs-skin-underline > span {
            border-color:#1d8873;
        }
        .cs-skin-underline > span::after {
            color:#1d8873;
        }
        .cs-skin-underline .cs-options, .cs-active .cs-options{
            background: white;
        }
        .cs-active .cs-options, .cs-options ul li:first-child{
            box-shadow: 0 0 20px 0 rgba(0,0,0,.2);
        }
        .cs-options{
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .cs-options ul li{
            display: inline-block;
            width: 50%;
            text-align: center;
        }
        .cs-options ul li span{
            transition: .2s;
        }
        .cs-options ul li:hover span{
            background: rgba(29,136,115,0.8) !important;
            color:white !important;
        }
        .cs-skin-underline ul span::before {
            display: none;
        }
        .cs-options ul li:first-child{
            width: 100%;
            border-bottom:2px solid #1d8873;
            display: none;
        }
    </style>
@endsection
@section('content')
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black g-font-weight-700 mb-4">Tutorías</h2>
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
                        <option value="{{$curso->grupo}}">{{$curso->nivel}} - {{$curso->grupo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    @if($descargar->tutoria)
                    <div class="panel">
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
               var valor=$(this).attr('data-value');
               $('li[data-value=todos]').delay(1000).show(100);
               if(valor!='todos'){
                   console.log("w");
                   for(var x=1; x<$('.column2').length; x++){
                       if($('.column2').eq(x).children().text().trim()==valor){
                           $('.column2').eq(x).parent('.row100').show();
                       }else{
                           $('.column2').eq(x).parent('.row100').hide();
                       }
                   }
               }else{
                   console.log("s");
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