@extends('master')
@section('title','Calendario Escolar')
@php
$dia= date('j');
$mes= date('M'); // Para el calendario
$MesActivo= date('n'); // Para el trimestre
$Primero=$Segundo=$Tercero=['',''];
    if($MesActivo < 4){
    $Segundo=['active', 'show'];
    }else if( $MesActivo >= 4 && $MesActivo <8){
    $Tercero=['active', 'show'];
    }else{
    $Primero=['active', 'show'];
    }
@endphp
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css"/>
    <link rel="stylesheet" href="/vendor/calendar/bootstrap-year-calendar.min.css">
@endsection
@section('content')
    <section id='calendarioEscolar' class="container-fluid g-px-50">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-12">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black mb-4">Calendario Escolar</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>

                <div class="col-12 col-xl-8 g-order-2 g-order-1--xl">
                    <h2 class="h3 g-color-gray-dark-v2 g-font-weight-700 mb-4 text-center">2020 - 2021</h2>
                    <div class="leyenda row">
                        <div class="cajacubo col-6 col-sm-4 col-md-2">
                            <div class="cubo festivo"></div> Días no lectivos
                        </div>
                        <div class="cajacubo col-6 col-sm-4 col-md-2">
                            <div class="cubo libre"></div> Días de libre disposición
                        </div>
                        <div class="cajacubo col-6 col-sm-4 col-md-2">
                            <div class="cubo evaluacion"></div> Evaluaciones
                        </div>
                        <div class="cajacubo col-6 col-sm-4 col-md-2">
                            <div class="cubo padres d-flex align-items-center justify-content-center">1</div> Visita de padres
                        </div>
                        <div class="cajacubo col-6 col-sm-4 col-md-2">
                            <div class="cubo singular"></div> Fecha singulares
                        </div>
                        <div class="cajacubo col-6 col-sm-4  col-md-2">
                            <div class="cubo dia-actual"></div> Hoy
                        </div>
                    </div>
                    <div class="calendar calendar2019"></div>
                    <div class="calendar2 calendar2020"></div>
                </div>
{{--                @php--}}
{{--                    function date_sort($a, $b) {--}}
{{--                        return strtotime($a) - strtotime($b);--}}
{{--                    }--}}
{{--                    usort($prueba, "date_sort");--}}
{{--                    dd($prueba[0]->fecha)--}}
{{--                @endphp                --}}
                <div class="col-12 col-md-8 col-xl-4 g-order-1 g-order-2--xl">
                    <!-- Nav tabs -->
                    @if(!empty($descargar->calescolar) || !empty($descargar->calpadres))
                    <div>
                        <div class="g-mb-20 text-center">
                            <h4 class="text-center g-mb-20">Descarga el calendario</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-center CajaArchivosCalendario g-mb-20">
                            @if(!empty($descargar->calescolar))
                            <a href="{{$descargar->calescolar->getUrl()}}" download class="btn btn-md u-btn-primary u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mx-10 text-left">
                                <i class="fa fa-download pull-left g-font-size-35 g-mr-10"></i>
                                <span class="text-left">
                                Escolar
                                <span class="d-block g-font-size-11">Descargar</span>
                            </span>
                            </a>
                            @endif
                            @if(!empty($descargar->calpadres))
                            <a href="{{$descargar->calpadres->getUrl()}}" download class="btn btn-md u-btn-primary u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mx-10 text-left">
                                <i class="fa fa-download pull-left g-font-size-35 g-mr-10"></i>
                                <span class="text-left">
                                Visita de Padres
                                <span class="d-block g-font-size-11">Descargar</span>
                            </span>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    <ul class="nav text-center nav-justified u-nav-v7-1" role="tablist" data-target="nav-7-1-default-hor-left-big-icons" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">
                        <li class="nav-item">
                            <a class="nav-link {{$Primero[0]}}" data-toggle="tab" href="#primero" role="tab">
                                <i class="icon-education-005 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Primer Trimestre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$Segundo[0]}}" data-toggle="tab" href="#segundo" role="tab">
                                <i class="icon-education-116 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Segundo Trimestre
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{$Tercero[0]}}" data-toggle="tab" href="#tercero" role="tab">
                                <i class="icon-education-199 u-line-icon-pro d-block g-font-size-25 u-tab-line-icon-pro"></i>
                                Tercer Trimestre
                            </a>
                        </li>
                    </ul>
                    <!-- End Nav tabs -->

                    <!-- Tab panes -->
                    <div id="nav-7-1-default-hor-left-big-icons" class="tab-content g-pt-20">
                        <div class="tab-pane fade {{$Primero[0]}} {{$Primero[1]}} rounded u-shadow-v1-5" id="primero" role="tabpanel">
                            <!-- Hover Rows -->
                            <div class="card g-brd-primary g-overflow-hidden rounded g-mb-30 ">
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
                                            @foreach($calendario as $d)
                                                @php
                                                    $fecha=explode("-",$d->fecha);
                                                @endphp
                                                @if($fecha[1]==9)
                                                    <tr>
                                                        <th class="fecha">{{$fecha[0]}}</th>
                                                        <td class="evento">{{$d->tema}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
                                            @foreach($calendario as $d)
                                                @php
                                                    $fecha=explode("-",$d->fecha);
                                                @endphp
                                                @if($fecha[1]==10)
                                                    <tr>
                                                        <th class="fecha">{{$fecha[0]}}</th>
                                                        <td class="evento">{{$d->tema}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
                                            @foreach($calendario as $d)
                                                @php
                                                    $fecha=explode("-",$d->fecha);
                                                @endphp
                                                @if($fecha[1]==11)
                                                    <tr>
                                                        <th class="fecha">{{$fecha[0]}}</th>
                                                        <td class="evento">{{$d->tema}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==12)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Hover Rows -->
                        </div>
                        <div class="tab-pane fade {{$Segundo[0]}} {{$Segundo[1]}} rounded u-shadow-v1-5" id="segundo" role="tabpanel">
                            <div class="card g-brd-secondary g-overflow-hidden rounded g-mb-30">
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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==1)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach

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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==2)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach

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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==3)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{$Tercero[0]}} {{$Tercero[1]}} rounded u-shadow-v1-5" id="tercero" role="tabpanel">
                            <div class="card g-brd-primary g-overflow-hidden rounded g-mb-30">
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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==4)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==5)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
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
                                        @foreach($calendario as $d)
                                            @php
                                                $fecha=explode("-",$d->fecha);
                                            @endphp
                                            @if($fecha[1]==6)
                                                <tr>
                                                    <th class="fecha">{{$fecha[0]}}</th>
                                                    <td class="evento">{{$d->tema}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
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
            var currentYear = new Date('8/1/2020').getFullYear();
            var endyear = new Date('12/31/2020');
            var nextyear = new Date('06/31/2021');
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
                    @foreach($calendario as $a)
                        @php
                        $fecha=explode("-",$a->fecha);
                        @endphp
                        @if($fecha[2]=='2020')
                            {
                                nombre:'{{$a->tipo}}',
                                tema:'{{$a->tema}}',
                                startDate: new Date(currentYear, {{$fecha[1] - 1}}, {{$fecha[0]}}),
                                endDate: new Date(currentYear, {{$fecha[1]  - 1}}, {{$fecha[0]}})
                            },
                        @endif
                    @endforeach
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
                    @foreach($calendario as $a)
                    @php
                        $fecha=explode("-",$a->fecha);
                    @endphp
                    @if($fecha[2]=='2020')
                        {
                            nombre:'{{$a->tipo}}',
                            tema:'{{$a->tema}}',
                            startDate: new Date(currentNextYear, {{$fecha[1] - 1}}, {{$fecha[0]}}),
                            endDate: new Date(currentNextYear, {{$fecha[1]  - 1}}, {{$fecha[0]}})
                        },
                    @endif
                    @endforeach
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
                    }
                ]
            });
            $('.prev.disabled, .next.disabled, .year-neighbor2, .year-neighbor').remove();
            $('.calendar2019 .months-container').append($('.calendar2020 .months-container').html());
            $('.year-title').html('2020 - 2021');
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
