@extends('master')
@section('title','Equipo Docente')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css"/>
@endsection
@section('content')

    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black mb-4">Equipo Docente</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    @if($descargar)
                    <div class="panel-descarga">
                        <ul class="list-unstyled objetos-panel">
                            <li>
                                <a class="download tooltipster" title="Descargar" href="{{$descargar->docente->getUrl()}}" download><i class="fa fa-download"></i></a>
                            </li>
                            <li>
                                <a class="downloand-print tooltipster" title="Imprimir" href="{{$descargar->docente->getUrl()}}"><i class="fa fa-print"></i></a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="tabla ver2 m-b-110">
                        <div class="tabla-head">
                            <table>
                                <thead>
                                <tr class="row100 head g-bg-primary">
                                    <th class="columnas column1">Departamento</th>
                                    <th class="columnas column2">Profesor/a</th>
                                    <th class="columnas column3">Cargo</th>
                                    <th class="columnas column4">Correo Electrónico</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <style>
                        </style>
                        <div class="tabla-body js-pscroll">
                            <table>
                                <tbody>
                                @php
                                $color='gris';
                                @endphp
                                @foreach($departamentos as $key=>$dep)
                                    @if(count($dep->equipoDocentes)>1)
                                        @php
                                        if($color=='gris'){$color='blanco';}else{$color='gris';};
                                        @endphp
                                        <tr class="row100 body {{$color}}">
                                            <td data-column="Departamento" class="columnas column1" rowspan="{{count($dep->equipoDocentes)+1}}">
                                                <p>
                                                    {{$dep->nombre}}
                                                </p>
                                            </td>
                                        </tr>
                                        @foreach($dep->equipoDocentes as $equipo)
                                            <tr class="body-contenido {{$color}}">
                                                <td data-column="Profesor/a" class="columnas column2">
                                                    <p>
                                                        {{$equipo->profesores}}
                                                    </p>
                                                </td>

                                                <td data-column="Cargo" class="columnas column3">
                                                    <p>
                                                        {{$equipo->cargo}}
                                                    </p>
                                                </td>
                                                <td data-column="Correo Electrónico" class="columnas column4">
                                                    <p>
                                                        {{$equipo->email}}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @elseif(count($dep->equipoDocentes)==1)
                                        @php
                                            if($color=='gris'){$color='blanco';}else{$color='gris';};
                                        @endphp
                                        <tr class="row100 body {{$color}}">
                                            <td data-column="Departamento" class="columnas column1" rowspan="1">
                                                <p>
                                                    {{$dep->nombre}}
                                                </p>
                                            </td>
                                            <td data-column="Profesor/a" class="columnas column2">
                                                <p>
                                                    {{$dep->equipoDocentes[0]->profesores}}
                                                </p>
                                            </td>

                                            <td data-column="Cargo" class="columnas column3">
                                                <p>
                                                    {{$dep->equipoDocentes[0]->cargo}}
                                                </p>
                                            </td>
                                            <td data-column="Correo Electrónico" class="columnas column4">
                                                <p>
                                                    {{$dep->equipoDocentes[0]->email}}
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
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
    <script type="text/javascript" src="/vendor/tooltipster-master/js/tooltipster.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.tooltipster').tooltipster({
                theme: 'tooltipster-shadow'
            });

        });
    </script>
@endsection