@extends('master')
@section('title','Calendario Escolar')
@php
$dia= date('j');
$mes= date('M');
@endphp
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css"/>
    <link rel="stylesheet" href="/vendor/calendar/bootstrap-year-calendar.min.css">
    <style>
        .fecha{
            width: 15%;
            text-align: left;
            padding-left: 15px !important;

        }
        .evento{
            width: 85%;
            text-align: left;
        }
        /*CSS del calendario*/
        .months-container{
            display: flex !important;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col-calendario{
            width: 30%;
            float:left;
            position: relative;
            min-height: 1px;
        }
        .calendar2019 .months-container .month-container:nth-child(1),
        .calendar2019 .months-container .month-container:nth-child(2),
        .calendar2019 .months-container .month-container:nth-child(3),
        .calendar2019 .months-container .month-container:nth-child(4),
        .calendar2019 .months-container .month-container:nth-child(5),
        .calendar2019 .months-container .month-container:nth-child(6),
        .calendar2019 .months-container .month-container:nth-child(7),
        .calendar2019 .months-container .month-container:nth-child(8),
        .calendar2019 .months-container .month-container:nth-child(19),
        .calendar2019 .months-container .month-container:nth-child(20),
        .calendar2019 .months-container .month-container:nth-child(21),
        .calendar2019 .months-container .month-container:nth-child(22),
        .calendar2019 .months-container .month-container:nth-child(23),
        .calendar2019 .months-container .month-container:nth-child(24)
        {
            display: none;
        }
        .calendar2{
            display: none;
        }
        .calendar .month-container{
            height: 350px;
            padding: 10px;
            border:1px solid rgba(29, 136, 115,0.4);
            border-radius: 1rem;
            margin: 10px;
            box-shadow: 0 10px 6px -6px rgba(0, 0, 0, 0.2);
        }
        .calendar table.month tr td .day-content{
            padding: 10px 12px;
        }
        .calendar table td, .calendar table th{
            font-size: 16px;
        }
        .month tr td:nth-child(6), .month tr td:nth-child(7){
            background: lightcoral;
            color: rgba(0,0,0,.9);
        }
        .month tr td:nth-child(6).disabled, .month tr td:nth-child(7).disabled{
            background: transparent;
        }
        .calendar .calendar-header table th:hover {
            background: transparent;
            cursor: initial;
        }
        .dia-activo{
            background: rgba(9, 9, 80,0.9) !important;
            border: 1px solid black;
            color: white;
        }

        @media only screen and (min-width: 1200px) {
            .g-order-1--xl{
                order:1;
            }
            .g-order-2--xl{
                order:2;
            }
        }
        @media only screen and (max-width: 1700px) {
            .col-calendario {
                width: 45%;
            }
        }
        @media only screen and (max-width: 800px){
            .month-container{
                width: auto;
            }
        }
        @media only screen and (max-width: 450px){
            .container-fluid{
                padding:0 !important;
            }
            .card{
                border-radius: 0 !important;
            }
        }

    </style>
@endsection
@section('content')
    <section class="container-fluid g-px-50">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black g-font-weight-700 mb-4">Calendario Escolar</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
                <div class="col-12 col-xl-8 g-order-2 g-order-1--xl">
                    <div class="calendar calendar2019"></div>
                    <div class="calendar2 calendar2020"></div>
                </div>
                <div class="col-12 col-md-8 col-xl-4 g-order-1 g-order-2--xl">
                    <!-- Nav tabs -->
                    <ul class="nav text-center nav-justified u-nav-v7-1" role="tablist" data-target="nav-7-1-default-hor-left-big-icons" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#primero" role="tab">
                                <i class="icon-education-005 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Primer Trimestre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#segundo" role="tab">
                                <i class="icon-education-116 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Segundo Trimestre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tercero" role="tab">
                                <i class="icon-education-199 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Tercer Trimestre
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav tabs -->

                    <!-- Tab panes -->
                    <div id="nav-7-1-default-hor-left-big-icons" class="tab-content g-pt-20">
                        <div class="tab-pane fade show active rounded u-shadow-v1-5" id="primero" role="tabpanel">
                            <!-- Hover Rows -->
                            <div class="card g-brd-primary rounded g-mb-30 ">
                                <h3 class="card-header g-bg-primary g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                                    <i class="icon-communication-146 u-line-icon-pro g-mr-5"></i>
                                    Primer Trimestre
                                </h3>

                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Septiembre</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                        <tr>
                                            <th class="g-font-weight-600 fecha">Día</th>
                                            <th class="g-font-weight-600 evento">Evento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="fecha">10</th>
                                            <td class="evento">Presentaciones de la ESO y Bachillerato.</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">11</th>
                                            <td class="evento">Inicio de las clases para todos los niveles.</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">18</th>
                                            <td class="evento">Reunión de familias 1ºESO y 1ºBachillerato (en horario de tarde).</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">27</th>
                                            <td class="evento">Convivencia general del centro.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Octubre</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                        <tr>
                                            <th class="g-font-weight-600 fecha">Día</th>
                                            <th class="g-font-weight-600 evento">Evento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="fecha">14</th>
                                            <td class="evento">Atención a familias en horario de tarde (información inicial).</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">30</th>
                                            <td class="evento">Atención a familias con cita previa.</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">31</th>
                                            <td class="evento">Fiesta de Finaos o Halloween (Finaween).</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Noviembre</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                        <tr>
                                            <th class="g-font-weight-600 fecha">Día</th>
                                            <th class="g-font-weight-600 evento">Evento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="fecha">4</th>
                                            <td class="evento">Día de libre disposición.</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">19</th>
                                            <td class="evento">Atención a familias en horario de tarde (con cita previa).</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Diciembre</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                        <tr>
                                            <th class="g-font-weight-600 fecha">Día</th>
                                            <th class="g-font-weight-600 evento">Evento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="fecha">11</th>
                                            <td class="evento">Entrega de notas y atención a familias en horario de tarde.</td>
                                        </tr>
                                        <tr>
                                            <th class="fecha">20</th>
                                            <td class="evento">Gala solidaria </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Hover Rows -->
                        </div>
                        <div class="tab-pane fade rounded u-shadow-v1-5" id="segundo" role="tabpanel">
                            <div class="card g-brd-secondary rounded g-mb-30">
                                <h3 class="card-header g-bg-secondary g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0 text-center">
                                    <i class="icon-communication-146 u-line-icon-pro g-mr-5"></i>
                                    Segundo Trimestre
                                </h3>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Enero</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">16</th>
                                                <td class="evento">Atención a familias en horario de tarde con cita previa.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Febrero</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">11</th>
                                                <td class="evento">Atención a familias en horario de tarde.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">21</th>
                                                <td class="evento">Fiesta de carnaval.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">24 y 26</th>
                                                <td class="evento">Días de libre disposición.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Marzo</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">4</th>
                                                <td class="evento">Atención a familias con cita previa en horario de tarde.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">13</th>
                                                <td class="evento">Fin del segundo trimestre.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">23</th>
                                                <td class="evento">Entrega de notas y visita de padres/madres en horario de tarde.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade rounded u-shadow-v1-5" id="tercero" role="tabpanel">
                            <div class="card g-brd-primary rounded g-mb-30">
                                <h3 class="card-header g-bg-primary g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0 text-right">
                                    <i class="icon-communication-146 u-line-icon-pro g-mr-5"></i>
                                    Tercer Trimestre
                                </h3>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Abril</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">2 y 3</th>
                                                <td class="evento">Jornadas Culturales</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">23</th>
                                                <td class="evento">Atención a familias en horario de tarde con cita previa.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">23</th>
                                                <td class="evento">Encuentro de Secundaria – Día del libro.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Mayo</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">4</th>
                                                <td class="evento">Día de libre disposición.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">21</th>
                                                <td class="evento">Finalización de las clases de 2º de Bachillerato. Entrega de Notas de 2º de Bachillerato.
                                                    <br>Visita de padres y madres en horario de tarde.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">22</th>
                                                <td class="evento">Orla 2º de Bachillerato. (Opción alternativa: 19 de junio).</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">29</th>
                                                <td class="evento">Celebración del Día de Canarias.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <div class="titulo g-pa-10 text-center g-font-size-18 g-font-weight-600">Junio</div>
                                    <table class="table table-hover u-table--v1 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="g-font-weight-600 fecha">Día</th>
                                                <th class="g-font-weight-600 evento">Evento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="fecha">17</th>
                                                <td class="evento">Publicación notas 2º Bachillerato. Convocatoria extraordinaria.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">18</th>
                                                <td class="evento">Orla 4o ESO.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">19</th>
                                                <td class="evento">Fin de las clases de ESO y 1º Bachillerato.</td>
                                            </tr>
                                            <tr>
                                                <th class="fecha">25</th>
                                                <td class="evento">Entrega de notas.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="/vendor/calendar/bootstrap-year-calendar.js"></script>
    <script src="/vendor/tooltipster-master/js/tooltipster.bundle.min.js"></script>
    <script>
        $(function() {
            var currentYear = new Date('8/1/2019').getFullYear();
            var endyear = new Date('12/31/2019');
            var nextyear = new Date('06/31/2020');
            console.log(currentYear);

            $('.calendar').calendar({
                minDate: new Date(currentYear,8,2),
                maxDate: new Date(endyear),
                language:'es',
                style:'custom',
                enableContextMenu: true,
                enableRangeSelection: true,
                customDataSourceRenderer: function(element, date, events) {
                    $(element).css('border-radius', '0').addClass('tooltipster').attr('title',events[0].tema);
                    if(events[0].nombre=='Festivo'){
                        $(element).css('background', 'lightcoral');
                    }else if(events[0].nombre=='Evaluación'){
                        $(element).css('background', '#e4ccb8');
                    }else if(events[0].nombre=='Padres'){
                        $(element).css('color', 'red');
                        $(element).css('font-weight', 'bold');
                    }else if(events[0].nombre=='Singular'){
                        $(element).css('background', 'lightgreen');
                    }else if(events[0].nombre=='Libre'){
                        $(element).css('background', 'lightblue');
                    }
                },
                dataSource: [
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentYear, 8, 2),
                        endDate: new Date(currentYear, 8, 6)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentYear, 9, 7),
                        endDate: new Date(currentYear, 9, 9)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentYear, 11, 2),
                        endDate: new Date(currentYear, 11, 4)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentYear, 8, 9),
                        endDate: new Date(currentYear, 8, 9)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentYear, 11, 6),
                        endDate: new Date(currentYear, 11, 6)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentYear, 11, 9),
                        endDate: new Date(currentYear, 11, 9)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentYear, 11, 23),
                        endDate: new Date(currentYear, 11, 31)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Visita de Padres',
                        startDate: new Date(currentYear, 8, 10),
                        endDate: new Date(currentYear, 8, 10)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Reunión de Familias 1ºEso y 1ºBachillerato (en horario de tarde)',
                        startDate: new Date(currentYear, 8, 18),
                        endDate: new Date(currentYear, 8, 18)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde (información inicial)',
                        startDate: new Date(currentYear, 9, 14),
                        endDate: new Date(currentYear, 9, 14)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias con cita previa',
                        startDate: new Date(currentYear, 9, 30),
                        endDate: new Date(currentYear, 9, 30)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde (con cita previa)',
                        startDate: new Date(currentYear, 10, 19),
                        endDate: new Date(currentYear, 10, 19)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Entrega de notas y atención a familias en horario de tarde',
                        startDate: new Date(currentYear, 11, 11),
                        endDate: new Date(currentYear, 11, 11)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Inicio de las clases para todos los niveles',
                        startDate: new Date(currentYear, 8, 11),
                        endDate: new Date(currentYear, 8, 11)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Convivencia general del centro',
                        startDate: new Date(currentYear, 8, 27),
                        endDate: new Date(currentYear, 8, 27)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Fiesta de Finaos o Halloween (Finaween)',
                        startDate: new Date(currentYear, 9, 31),
                        endDate: new Date(currentYear, 9, 31)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Gala Solidaria',
                        startDate: new Date(currentYear, 11, 20),
                        endDate: new Date(currentYear, 11, 20)
                    },
                    {
                        nombre: 'Libre',
                        tema:'Día de libre disposición ',
                        startDate: new Date(currentYear, 10, 4),
                        endDate: new Date(currentYear, 10, 4)
                    }
                ]

            });
            var currentNextYear =new Date('01/01/2020').getFullYear();
            $('.calendar2').calendar({
                startYear:'2020',
                minDate: new Date('01/01/2020'),
                maxDate: new Date(nextyear),
                language:'es',
                style:'custom',
                enableContextMenu: true,
                enableRangeSelection: true,
                customDataSourceRenderer: function(element, date, events) {
                    $(element).css('border-radius', '0').addClass('tooltipster').attr('title',events[0].tema);
                    if(events[0].nombre=='Festivo'){
                        $(element).css('background', 'lightcoral');
                    }else if(events[0].nombre=='Evaluación'){
                        $(element).css('background', '#e4ccb8');
                    }else if(events[0].nombre=='Padres'){
                        $(element).css('color', 'red');
                        $(element).css('font-weight', 'bold');
                    }else if(events[0].nombre=='Singular'){
                        $(element).css('background', 'lightgreen');
                    }else if(events[0].nombre=='Libre'){
                        $(element).css('background', 'lightblue');
                    }
                },
                dataSource: [
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 1, 3),
                        endDate: new Date(currentNextYear, 1, 4)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 2, 16),
                        endDate: new Date(currentNextYear, 2, 18)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 4, 12),
                        endDate: new Date(currentNextYear, 4, 12)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 4, 19),
                        endDate: new Date(currentNextYear, 4, 19)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 5, 9),
                        endDate: new Date(currentNextYear, 5, 9)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 5, 15),
                        endDate: new Date(currentNextYear, 5, 16)
                    },
                    {
                        nombre: 'Evaluación',
                        tema:'Evaluaciones',
                        startDate: new Date(currentNextYear, 5, 22),
                        endDate: new Date(currentNextYear, 5, 22)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentNextYear, 0, 1),
                        endDate: new Date(currentNextYear, 0, 7)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentNextYear, 1, 25),
                        endDate: new Date(currentNextYear, 1, 25)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentNextYear, 3, 6),
                        endDate: new Date(currentNextYear, 3, 10)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentNextYear, 4, 1),
                        endDate: new Date(currentNextYear, 4, 1)
                    },
                    {
                        nombre: 'Festivo',
                        tema:'Día no lectivo',
                        startDate: new Date(currentNextYear, 5, 24),
                        endDate: new Date(currentNextYear, 5, 24)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde con cita previa',
                        startDate: new Date(currentNextYear, 0, 16),
                        endDate: new Date(currentNextYear, 0, 16)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde',
                        startDate: new Date(currentNextYear, 1, 11),
                        endDate: new Date(currentNextYear, 1, 11)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde con cita previa',
                        startDate: new Date(currentNextYear, 2, 4),
                        endDate: new Date(currentNextYear, 2, 4)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Entrega de notas y visita de padres/madres en horario de tarde',
                        startDate: new Date(currentNextYear, 2, 23),
                        endDate: new Date(currentNextYear, 2, 23)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Atención a familias en horario de tarde con cita previa',
                        startDate: new Date(currentNextYear, 3, 22),
                        endDate: new Date(currentNextYear, 3, 22)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Finalización de las clases de 2º de Bachillerato. Entrega de Notas de 2º de Bachillerato. Visita de padres y madres en horario de tarde',
                        startDate: new Date(currentNextYear, 4, 21),
                        endDate: new Date(currentNextYear, 4, 21)
                    },				{
                        nombre: 'Padres',
                        tema:'Publicación notas 2º Bachillerato. Convocatoria extraordinaria. \n',
                        startDate: new Date(currentNextYear, 5, 17),
                        endDate: new Date(currentNextYear, 5, 17)
                    },
                    {
                        nombre: 'Padres',
                        tema:'Entrega de notas',
                        startDate: new Date(currentNextYear, 5, 25),
                        endDate: new Date(currentNextYear, 5, 25)
                    },

                    {
                        nombre: 'Singular',
                        tema:'Jornadas Culturales',
                        startDate: new Date(currentNextYear, 3, 2),
                        endDate: new Date(currentNextYear, 3, 3)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Fiesta de carnaval',
                        startDate: new Date(currentNextYear, 1, 21),
                        endDate: new Date(currentNextYear, 1, 21)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Encuentro de Secundaria - Día del Libro',
                        startDate: new Date(currentNextYear, 3, 23),
                        endDate: new Date(currentNextYear, 3, 23)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Orla 2º de Bachillerato. (Opción alternativa: 19 de junio)',
                        startDate: new Date(currentNextYear, 4, 22),
                        endDate: new Date(currentNextYear, 4, 22)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Celebración del Día de Canarias',
                        startDate: new Date(currentNextYear, 4, 29),
                        endDate: new Date(currentNextYear, 4, 29)
                    },
                    {
                        nombre: 'Singular',
                        tema:'Orla 4º ESO',
                        startDate: new Date(currentNextYear, 5, 18),
                        endDate: new Date(currentNextYear, 5, 18)
                    },
                    {
                        nombre: 'Libre',
                        tema:'Día de libre disposición',
                        startDate: new Date(currentNextYear, 1, 24),
                        endDate: new Date(currentNextYear, 1, 24)
                    },
                    {
                        nombre: 'Libre',
                        tema:'Día de libre disposición',
                        startDate: new Date(currentNextYear, 1, 26),
                        endDate: new Date(currentNextYear, 1, 26)
                    },
                    {
                        nombre: 'Libre',
                        tema:'Día de libre disposición',
                        startDate: new Date(currentNextYear, 4, 4),
                        endDate: new Date(currentNextYear, 4, 4)
                    }
                ]
            });
            $('.prev.disabled, .next.disabled, .year-neighbor2, .year-neighbor').remove();
            $('.calendar2019 .months-container').append($('.calendar2020 .months-container').html());
            $('.year-title').html('2019 - 2020');
            $('.calendar2').remove();
            // initialization of tooltipster
            $('.tooltipster').tooltipster({
                theme: 'tooltipster-punk'
            });
            if($(".month[data-mes='{{$mes}}']")){
                $(".month[data-mes='{{$mes}}']").find(".day-content[data-dia='{{$dia}}']").addClass('dia-activo');
            }
        });
    </script>
@endsection