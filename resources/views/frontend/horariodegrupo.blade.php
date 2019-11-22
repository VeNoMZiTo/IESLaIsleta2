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
                        <h2 class="h1 u-heading-v2__title g-mb-10 g-color-black ">Horario de {{$horario[0]->curso->curso}}</h2>
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
                                                                @foreach($horario as $h)
                                                                    @if($h->dia == 'lunes' && $h->horario=='primera')
                                                                        <div style="background:{{$h->color}}">
                                                                            {{$h->asignatura}}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td data-column="martes" class="columnas column3">
                                                            <div class="dos-clases">
                                                                @foreach($horario as $h)
                                                                    @if($h->dia == 'martes' && $h->horario=='primera')
                                                                        <div style="background:{{$h->color}}">
                                                                            {{$h->asignatura}}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td data-column="miercoles" class="columnas column4">
                                                            <div class="dos-clases">
                                                                @foreach($horario as $h)
                                                                    @if($h->dia == 'miercoles' && $h->horario=='primera')
                                                                        <div style="background:{{$h->color}}">
                                                                            {{$h->asignatura}}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td data-column="jueves" class="columnas column5">
                                                            <div class="dos-clases">
                                                                @foreach($horario as $h)
                                                                    @if($h->dia == 'jueves' && $h->horario=='primera')
                                                                        <div style="background:{{$h->color}}">
                                                                            {{$h->asignatura}}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        <td data-column="viernes" class="columnas column6">
                                                            <div class="dos-clases">
                                                                @foreach($horario as $h)
                                                                    @if($h->dia == 'viernes' && $h->horario=='primera')
                                                                        <div style="background:{{$h->color}}">
                                                                            {{$h->asignatura}}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            8:55 - 9:50
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'lunes' && $h->horario=='segunda')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'martes' && $h->horario=='segunda')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'miercoles' && $h->horario=='segunda')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'jueves' && $h->horario=='segunda')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'viernes' && $h->horario=='segunda')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            9:50 - 10:45
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'lunes' && $h->horario=='tercera')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'martes' && $h->horario=='tercera')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'miercoles' && $h->horario=='tercera')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'jueves' && $h->horario=='tercera')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'viernes' && $h->horario=='tercera')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
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
                                                            RECREO
                                                        </p>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <p>
                                                            RECREO
                                                        </p>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4">
                                                        <p>
                                                            RECREO
                                                        </p>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <p>
                                                            RECREO
                                                        </p>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <p>
                                                            RECREO
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
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'lunes' && $h->horario=='cuarta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'martes' && $h->horario=='cuarta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'miercoles' && $h->horario=='cuarta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'jueves' && $h->horario=='cuarta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'viernes' && $h->horario=='cuarta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            12:10 - 13:05
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'lunes' && $h->horario=='quinta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'martes' && $h->horario=='quinta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'miercoles' && $h->horario=='quinta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'jueves' && $h->horario=='quinta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'viernes' && $h->horario=='quinta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="row100 body">
                                                    <td data-column="hora" class="columnas column1">
                                                        <p>
                                                            13:05 - 14:00
                                                        </p>
                                                    </td>
                                                    <td data-column="lunes" class="columnas column2">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'lunes' && $h->horario=='sexta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="martes" class="columnas column3">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'martes' && $h->horario=='sexta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="miercoles" class="columnas column4 " >
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'miercoles' && $h->horario=='sexta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="jueves" class="columnas column5">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'jueves' && $h->horario=='sexta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td data-column="viernes" class="columnas column6">
                                                        <div class="dos-clases">
                                                            @foreach($horario as $h)
                                                                @if($h->dia == 'viernes' && $h->horario=='sexta')
                                                                    <div style="background:{{$h->color}}">
                                                                        {{$h->asignatura}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
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