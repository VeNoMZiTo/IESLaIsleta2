@extends('master')
@section('title','Calendario Escolar')
@section('css')
@endsection
@section('content')
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-7">
                    <!-- Heading -->
                    <div class="text-center">
                        <h2 class="h1 g-color-black g-font-weight-700 mb-4">Calendario Escolar</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
                <div class="col-12">
                    <img src="/img/calendarioescolar/calendario.jpg" class="img-fluid ">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection