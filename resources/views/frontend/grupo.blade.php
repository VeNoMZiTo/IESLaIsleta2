@extends('master')
@section('title','Horario de luness')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/-master/css/.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/-master/css/plugins//sideTip/themes/-sideTip-shadow.min.css"/>
    <style>
        /*Tablas*/
        .horarios .column1{
            width: 10%;
        }
        .horarios .column2{
            width: 18%;
        }
        .horarios .column3{
            width: 18%;
        }
        .horarios .column4{
            width: 18%;
        }
        .horarios .column5{
            width: 18%;
        }
        .horarios .column6{
            width: 18%;
        }
        .verdeclaro{
            background: #c1ffe8;
        }
        .azulclaro{
            background:#c2e8ff;
        }
        .celeste{
            background: #c1fffe;
        }
        .naranja{
            background: #fed8c1;
        }
        .horarios .tabla-body td{
            padding:0;
        }
        .horarios .tabla-body .dos-clases div , .horarios .tabla-body p{
            padding: 16px 0;
        }
        .horarios td{
            border: 1px solid rgba(0,0,0,.4);
        }
        /*Menú*/
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
    @php
    @endphp
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-50">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="u-heading-v2-6--bottom g-brd-primary g-mb-20 text-center titulo-horario">
                        <h2 class="h1 u-heading-v2__title g-mb-10 g-color-black ">Horario de Grupo</h2>
                        <h4 class="g-font-weight-200">Eres del curso {{$horario[0]->curso}}</h4>
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row">
                            <div class="col-12 px-0">
                                <div class="tabla horarios m-b-110">
                                    <div class="tabla-head">
                                        <table>
                                            <thead>
                                            <tr class="row100 head g-bg-primary">
                                                <th class="columnas column1">Hora</th>
                                                <th class="columnas column2">Lunes</th>
                                                <th class="columnas column3">Martes</th>
                                                <th class="columnas column4">Miércoles</th>
                                                <th class="columnas column5">Jueves</th>
                                                <th class="columnas column6">Viernes</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tabla-body js-pscroll">
                                        <table>
                                            <tbody>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            8:00 - 8:55
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2" >
                                                        <div class="dos-clases">
                                                            <div class="verdeclaro">
                                                                CulturaCi.
                                                            </div>
                                                            <div class="azulclaro">
                                                                SLE-Fra.I
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3 celeste">
                                                        <p>
                                                            Filosofía
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 naranja">
                                                        <p>
                                                            Fís. y Quí.
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5 naranja">
                                                        <p>
                                                            Fís. y Quí.
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6 celeste">
                                                        <p>
                                                            Filosofía
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            8:55 - 9:50
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            9:50 - 10:45
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            10:45 - 11:15
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            11:15 - 12:10
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            12:10 - 13:05
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            13:05 - 14:00
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
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
        });
    </script>
@endsection