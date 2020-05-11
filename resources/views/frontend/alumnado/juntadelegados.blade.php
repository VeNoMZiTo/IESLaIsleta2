@extends('master')
@section('title','Junta de Delegados')
@section('css')
@endsection
@section('content')
    <section id="juntaDelegados">
        <div class='container g-py-100'>
            <div class='row text-center g-mb-30'>
                <div class="text-center col-12">
                    <h2 class="h1 g-color-black mb-4">
                        {{$juntaDelegados->titulo ?? 'Junta de Delegados'}}
                    </h2>
                    <div class="d-inline-block g-width-70 g-height-2 g-bg-primary mb-4"></div>
                </div>
                <p class="lead g-px-200--lg g-color-gray-dark-v3">
                    {{$juntaDelegados->subtitulo ?? 'La Junta de delegad@s y subdelegad@s de centro es el <b>órgano de participación democrática</b> del alumnado por excelencia y por ley, después de la asamblea de clase.'}}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 g-mb-50 g-mb-0--lg">
                    @if($juntaDelegados && $juntaDelegados->texto)
                        {!! $juntaDelegados->texto !!}
                    @else
                        <p class="g-mb-30 g-color-gray-dark-v3 g-font-size-16 text-justify">
                            L@s delegad@s y subdelegad@s, como representantes de sus compañer@s:
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled listaEditable g-color-gray-dark-v3 g-font-size-16">
                                    <li class="g-mb-10 text-justify">
                                        {{--                                    <i class="icon-education-007 u-line-icon-pro g-color-primary align-self-center g-mr-10 g-font-size-18"></i>--}}
                                        Exponen <b>los problemas y dificultades de convivencia y rendimiento escolar</b> de sus grupos.
                                    </li>
                                    <li class="g-mb-10 text-justify">
                                        {{--                                    <i class="icon-education-078 u-line-icon-pro g-color-primary align-self-center g-mr-10 g-font-size-18"></i>--}}
                                        <b>Dialoga y debate las causas</b>, argumentando y contrastando, de forma ordenada con el resto de la Junta.
                                    </li>
                                    <li class="g-mb-10 text-justify">
                                        {{--                                    <i class="icon-education-002 u-line-icon-pro g-color-primary align-self-center g-mr-10 g-font-size-18"></i>--}}
                                        <b>Realizan propuestas</b> diversas para solventarlos de manera corresponsable, recogiendo siempre, el sentir de cada grupo.
                                    </li>
                                    <li class="g-mb-10 text-justify">
                                        {{--                                    <i class="icon-education-192 u-line-icon-pro g-color-primary align-self-center g-mr-10 g-font-size-18"></i>--}}
                                        Se <b>toman decisiones</b> por mayoría y <b>organizan acciones o actividades</b> para mejorar la convivencia y la participación del alumnado.
                                    </li>
                                    <li class="g-mb-10 text-justify">
                                        {{--                                    <i class="icon-education-133 u-line-icon-pro g-color-primary align-self-center g-mr-10 g-font-size-18"></i>--}}
                                        Se <b>informa de los asuntos tratados en el Consejo Escolar</b> y del Plan de Centro, a través de sus representantes en el Consejo Escolar.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid u-shadow-v1-5 rounded" src="{{$juntaDelegados && $juntaDelegados->imagen ? $juntaDelegados->imagen->getUrl() : '/img/junta-delegados/1.jpg'}}" alt="IES La Isleta Centro">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
