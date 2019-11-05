@extends('master')
@section('title','Como Crear una Cuenta')
@section('css')

@endsection
@section('content')
    <section>
        <div class='container g-py-100'>
            <div class="row">
                <div class="col-lg-6 g-mb-50 g-mb-0--lg">
                    <img class="img-fluid rounded u-shadow-v1-5" src="/img/pincelekade/pincelekade.PNG" alt="Pincel Ekade">
                </div>

                <div class="col-lg-6 align-self-center">
                    <header class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
                        <h2 class="h3 u-heading-v2__title g-font-weight-300">Como crear una cuenta en Pincel Ekade</h2>
                    </header>

                    <p class="g-font-size-16 g-color-gray-dark-v4 g-mb-30 text-justify">
                        La aplicación móvil APP Pincel Alumnado y Familias es una aplicación desarrollada por la Consejería de Educación y Universidades del Gobierno de Canarias. Es totalmente gratuita.
                    </p>
                    <p class="g-font-size-16 g-color-gray-dark-v4 g-mb-30 text-justify">
                        Su finalidad es permitir que las familias puedan consultar  datos de matrícula, las faltas, anotaciones, calificaciones del alumnado… así como las noticias y novedades de los centros educativos que sean del interés del alumnado o de sus familias y los mensajes que el centro desee hacer llegar de manera personal.
                    </p>
                    <div class="d-flex align-items-center justify-content-around g-mb-30 pincelekade-enlaces">
                        <a class="btn btn-md u-btn-primary rounded u-shadow-v1-5 g-brd-primary--hover g-bg-white--hover g-color-primary--hover" target="_blank" href="http://www3.gobiernodecanarias.org/medusa/edublogs/iessanbartolome/files/2019/02/folleto-app-alumnado-y-familias.pdf">
                            <i class="fa fa-plus g-mr-5"></i>
                            Más Información
                        </a>
                        <a class="btn btn-md u-btn-primary rounded u-shadow-v1-5 g-brd-primary--hover g-bg-white--hover g-color-primary--hover" target="_blank" href="http://www3.gobiernodecanarias.org/medusa/edublogs/iessanbartolome/files/2019/02/folleto-app-alumnado-y-familias.pdf">
                            <i class="fa fa-android g-mr-5"></i>
                            APP Android
                        </a>
                        <a class="btn btn-md u-btn-primary rounded u-shadow-v1-5 g-brd-primary--hover g-bg-white--hover g-color-primary--hover" target="_blank" href="http://www3.gobiernodecanarias.org/medusa/edublogs/iessanbartolome/files/2019/02/folleto-app-alumnado-y-familias.pdf">
                            <i class="fa fa-apple g-mr-5"></i>
                            APP Apple
                        </a>
                    </div>

                </div>
                <div class="col-12 g-mt-30">
                    <p class="g-font-size-16 g-color-gray-dark-v4 g-mb-30 text-justify">
                        Para empezar a usar la APP, deberás introducir un  usuario el NIF/NIE, el pasaporte o el CIAL.
                    </p>
                    <ol class="g-font-size-16 text-justify g-color-gray-dark-v4 g-mb-40">
                        <li class="g-mb-10">
                            Introducir su NIF/NIE, pasaporte o CIAL. Se le enviará un código por SMS y/o correo electrónico, al teléfono móvil y/o email que hayan registrado en el centro con el cual podrán restablecer la contraseña.
                        </li>
                        <li class="g-mb-10">
                            Acceder a la dirección WEB: <a href="https://www.gobiernodecanarias.org/educacion/cau_ce/clave">https://www.gobiernodecanarias.org/educacion/cau_ce/clave</a>
                        </li>
                    </ol>

                    <p class="g-font-size-16 g-color-gray-dark-v4 g-mb-30 text-justify">
                        <b>Nota</b>: es imprescindible que hayan proporcionado el correo electrónico o el número del teléfono móvil en el centro educativo.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
