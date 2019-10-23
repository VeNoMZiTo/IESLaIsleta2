@extends('master')
@section('title','Equipo Directivo')
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
                        <h2 class="h1 g-color-black g-font-weight-700 mb-4">Equipo Directivo</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <div class="panel">
                        <ul class="list-unstyled objetos-panel">
                            <li>
                                <a class="download tooltipster" title="Descargar" href="/pdf/prueba.pdf" download><i class="fa fa-download"></i></a>
                            </li>
                            <li>
                                <a class="downloand-print tooltipster" title="Imprimir" href="/pdf/prueba.pdf"><i class="fa fa-print"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabla ver1 m-b-110">
                        <div class="tabla-head">
                            <table>
                                <thead>
                                <tr class="row100 head g-bg-primary">
                                    <th class="columnas column1">Cargo</th>
                                    <th class="columnas column2">Nombre</th>
                                    <th class="columnas column3">Departamento</th>
                                    <th class="columnas column4">Correo Electrónico</th>
                                    <th class="columnas column5">Hora de Atención</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tabla-body js-pscroll">
                            <table>
                                <tbody>
                                <tr class="row100 body">
                                    <td data-column="Cargo" class="columnas column1">
                                        <p>
                                            Like a butterfly
                                        </p>
                                    </td>
                                    <td data-column="Nombre" class="columnas column2">
                                        <p>
                                            Boxing
                                        </p>
                                    </td>
                                    <td data-column="Departamento" class="columnas column3 tooltipster" title="Inglés">
                                        <p>
                                            ING
                                        </p>
                                    </td>
                                    <td data-column="Correo Electrónico" class="columnas column4">
                                        <p>
                                            Aaron Chapman
                                        </p>
                                    </td>
                                    <td data-column="Hora de Atención" class="columnas column5">
                                        <p>
                                            Solicitar cita
                                        </p>
                                    </td>
                                </tr>

                                <tr class="row100 body">
                                    <td data-column="Cargo" class="columnas column1">
                                        <p>
                                            Like a butterfly
                                        </p>
                                    </td>
                                    <td data-column="Nombre" class="columnas column2">
                                        <p>
                                            Boxing
                                        </p>
                                    </td>
                                    <td data-column="Departamento" class="columnas column3 tooltipster" title="Inglés">
                                        <p>
                                            ING
                                        </p>
                                    </td>
                                    <td data-column="Correo Electrónico" class="columnas column4">
                                        <p>
                                            Aaron Chapman
                                        </p>
                                    </td>
                                    <td data-column="Hora de Atención" class="columnas column5">
                                        <p>
                                            10
                                        </p>
                                    </td>
                                </tr>
                                <tr class="row100 body">
                                    <td data-column="Cargo" class="columnas column1">
                                        <p>
                                            Like a butterfly
                                        </p>
                                    </td>
                                    <td data-column="Nombre" class="columnas column2">
                                        <p>
                                            Boxing
                                        </p>
                                    </td>
                                    <td data-column="Departamento" class="columnas column3 tooltipster" title="Inglés">
                                        <p>
                                            ING
                                        </p>
                                    </td>
                                    <td data-column="Correo Electrónico" class="columnas column4">
                                        <p>
                                            Aaron Chapman
                                        </p>
                                    </td>
                                    <td data-column="Hora de Atención" class="columnas column5">
                                        <p>
                                            10
                                        </p>
                                    </td>
                                </tr>
                                <tr class="row100 body">
                                    <td data-column="Cargo" class="columnas column1">
                                        <p>
                                            Like a butterfly
                                        </p>
                                    </td>
                                    <td data-column="Nombre" class="columnas column2">
                                        <p>
                                            Boxing
                                        </p>
                                    </td>
                                    <td data-column="Departamento" class="columnas column3 tooltipster" title="Inglés">
                                        <p>
                                            ING
                                        </p>
                                    </td>
                                    <td data-column="Correo Electrónico" class="columnas column4">
                                        <p>
                                            Aaron Chapman
                                        </p>
                                    </td>
                                    <td data-column="Hora de Atención" class="columnas column5">
                                        <p>
                                            10
                                        </p>
                                    </td>
                                </tr>
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