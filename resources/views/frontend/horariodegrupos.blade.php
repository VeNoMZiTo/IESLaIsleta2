@extends('master')
@section('title','Horario de luness')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/-master/css/.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/-master/css/plugins//sideTip/themes/-sideTip-shadow.min.css"/>
    <style>
        /*Menú*/
        .button {
            float: left;
            min-width: 150px;
            display: block;
            margin: 1em;
            padding: 1em 2em;
            border: none;
            background: none;
            color: inherit;
            vertical-align: middle;
            position: relative;
            z-index: 1;
            -webkit-backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;

        }
        .button:focus {
            outline: none;
        }
        .button > span {
            vertical-align: middle;
        }
        .button--menu {
            margin: 1em 2em;
            -webkit-transition: color 0.3s;
            transition: color 0.3s;
            -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
            transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
            color:white;
            border-radius: .25rem;
            font-size: 16px;
            box-shadow: 0 0 20px 0 rgba(0,0,0,.2);

        }
        .button--menu.button--inverted {
            color: #1d8873;
        }
        .button--menu::before,
        .button--menu::after {
            content: '';
            position: absolute;
            border-radius: inherit;
            background: #1d8873;
            z-index: -1;
        }
        .button--menu::before {
            top: -4px;
            bottom: -4px;
            left: -4px;
            right: -4px;
            opacity: 0.4;
            -webkit-transform: scale3d(0.7, 1, 1);
            transform: scale3d(0.7, 1, 1);
            -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
            transition: transform 0.3s, opacity 0.3s;
        }
        .button--menu::after {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: scale3d(1.1, 1, 1);
            transform: scale3d(1.1, 1, 1);
            -webkit-transition: -webkit-transform 0.3s, background-color 0.3s;
            transition: transform 0.3s, background-color 0.3s;
        }
        .button--menu::before,
        .button--menu::after {
            -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
            transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        }
        .button--menu.button--inverted::before,
        .button--menu.button--inverted::after {
            background: white;
        }
        .button--menu:hover {
            color: #1d8873;
        }
        .button--menu:hover::before {
            opacity: 1;
        }
        .button--menu:hover::after {
            background-color: white;
        }
        .button--menu.button--inverted:hover::after {
            background-color: white;
        }
        .button--menu:hover::after,
        .button--menu:hover::before {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
        .titulo-horario:after{
            border-top-width: 2px;
        }

        @media only screen and (max-width:768px){
            .horarios .tabla-body div {
                display: inline-block;
                width: 50%;
            }
            .horarios .tabla-body .columnas{
                display: flex;
                align-items: center;
            }
        }
    </style>
@endsection
@section('content')

    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-50">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="u-heading-v2-6--bottom g-brd-primary g-mb-20 text-center titulo-horario">
                        <h2 class="h1 u-heading-v2__title g-mb-10 g-color-black ">Horario de Grupo</h2>
                        <h4 class="g-font-weight-200">¿De qué curso eres?</h4>
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row g-mb-30 justify-content-center">

                <div class="content col-12">
                    <div class="row ">
                        <div class="text-center text-uppercase u-heading-v6-2 g-mb-20 col-12">
                            <h2 class="h3 u-heading-v6__title">Educación Secundaria Obligatoria (ESO)</h2>
                        </div>
                        @php
                            $separador;
                            $nivel = [];
                            foreach($grupos as $g){
                                $separador=preg_split("/[\s,]+/", $g->curso);
                                if(!in_array($separador[1], $nivel)){
                                    array_push($nivel, $separador[1]);
                                }
                            }
                        @endphp
                        <div class="box col-12 d-flex justify-content-center">
                            @foreach($grupos as $g)
                                @if(strstr($g->curso,'1') && strstr($g,$nivel[0]))
                                    <a class="button button--menu button--round-s button--text-thick" href="/horario-de-grupos/grupo/{{$g->id}}">{{$g->curso}}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="box col-12 d-flex justify-content-center">
                            @foreach($grupos as $g)
                                @if(strstr($g->curso,'2') && strstr($g,$nivel[0]))
                                    <a class="button button--menu button--round-s button--text-thick">{{$g->curso}}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="box col-12 d-flex justify-content-center">
                            @foreach($grupos as $g)
                                @if(strstr($g->curso,'3') && strstr($g,$nivel[0]))
                                    <a class="button button--menu button--round-s button--text-thick">{{$g->curso}}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="box col-12 d-flex justify-content-center">
                            @foreach($grupos as $g)
                                @if(strstr($g->curso,'4') && strstr($g,$nivel[0]))
                                    <a class="button button--menu button--round-s button--text-thick">{{$g->curso}}</a>
                                @endif
                            @endforeach
                        </div>
                        <div class="text-center text-uppercase u-heading-v6-2 g-my-20 col-12">
                            <h2 class="h3 u-heading-v6__title">Bachillerato</h2>
                        </div>
                        <div class="box col-12 d-flex justify-content-center">
                            <div class="box col-12 d-flex justify-content-center">
                                @foreach($grupos as $g)
                                    @if(strstr($g->curso,'1') && strstr($g,$nivel[1]))
                                        <a class="button button--menu button--round-s button--text-thick">{{$g->curso}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="box col-12 d-flex justify-content-center">
                            <div class="box col-12 d-flex justify-content-center">
                                @foreach($grupos as $g)
                                    @if(strstr($g->curso,'2') && strstr($g,$nivel[1]))
                                        <a class="button button--menu button--round-s button--text-thick">{{$g->curso}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')

    <script type="text/javascript" src="/vendor/tooltipster-master/js/tooltipster.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
        });
    </script>
@endsection