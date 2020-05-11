@extends('master')
@section('title','Solicitud de Certificados')
@section('css')
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/tooltipster.bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/vendor/tooltipster-master/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css"/>
@endsection
@section('content')
    <section class="container">
        <div class="g-py-100">
            <div class="row justify-content-center g-mb-70">
                <div class="col-lg-7">
                    <!-- Heading -->
                    <div class="text-center">
                            <h2 class="h1 g-color-black mb-4">Solicitud de Certificados</h2>
                        <div class="d-inline-block g-width-70 g-height-2 g-bg-black mb-4 g-bg-primary"></div>
                        {{--                        <p class="g-font-size-18 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad dolorum ipsum laboriosam libero magnam maiores nemo quod similique voluptatibus!</p>--}}
                    </div>
                    <!-- End Heading -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <form id="f-contact" class="g-mb-20">
                        <div class="row">
                            <div class="col-md-6 form-group g-mb-20">
                                <label for='nombre' class="g-color-gray-dark-v2 g-font-size-13">Nombre</label>
                                <input id='nombre' name="nombre" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="">
                                <small id="e_name" class="errores"><strong>* </strong>Nombre no válido</small>
                            </div>
                            <div class="col-md-6 form-group g-mb-20">
                                <label for='apellidos' class="g-color-gray-dark-v2 g-font-size-13">Apellidos</label>
                                <input id='apellidos' name="apellidos" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="">
                                <small id="e_surname" class="errores"><strong>* </strong>Apellidos no válido</small>
                            </div>

                            <div class="col-md-6 form-group g-mb-20">
                                <label for='telefono' class="g-color-gray-dark-v2 g-font-size-13">Teléfono</label>
                                <input id='telefono' name="telefono" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="tel" placeholder="">
                                <small id="e_phone" class="errores"><strong>* </strong>Introduzca un número de teléfono</small>
                            </div>

                            <div class="col-md-6 form-group g-mb-20">
                                <label for='dni' class="g-color-gray-dark-v2 g-font-size-13 tooltipster g-cursor-info" title="Documento Nacional de Identidad">D.N.I</label>
                                <input id='dni' name="dni" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="">
                                <small id="e_dni" class="errores"><strong>* </strong>Introduzca un D.N.I</small>
                            </div>

                            <div class="col-md-12 form-group g-mb-20">
                                <label for='email' class="g-color-gray-dark-v2 g-font-size-13">Dirección de correo</label>
                                <input id='email' name="email" class="form-control g-color-black u-shadow-v1-3 g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="email" placeholder="">
                                <small id="e_email" class="errores"><strong>* </strong>Dirección de correo no válido</small>
                            </div>
                            <div class="col-12">
                                <div class="form-group row g-mb-25">
                                    <label for='certificado' class="col-sm-4 col-form-label g-pb-10 d-flex align-items-center">Selecione un tipo de certificado</label>
                                    <div class="col-sm-8">
                                        <select id='certificado' name="certificado" class="form-control form-control-md rounded u-shadow-v1-3">
                                            <option disabled hidden selected>Seleccionar</option>
                                            <option value="Matrícula">Matrícula</option>
                                            <option value="Estudios">Estudios</option>
                                            <option value="Notas">Notas</option>
                                            <option value="Títulación">Títulación</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                        <small id="e_certificado" class="errores"><strong>* </strong>Selecione un certificado</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group g-mb-40">
                                <label id='box-lopd' class="form-check-inline u-check g-pl-25">
                                    <input id='lopd' class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" >
                                    <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                        <i class="fa" data-check-icon=""></i>
                                    </div>
                                    He leído y acepto la política de privacidad.<br>
                                </label>
                                <br>
                                <small id="e_lopd" class="errores"><strong>* </strong>Tiene que aceptar la política de privacidad.</small>
                            </div>
                        </div>
                        <div class="u-divider u-divider-solid g-mt-10 g-mb-20 text-center u-divider-linear-gradient--primary">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Icon Blocks -->
                                <article class="media g-mb-20">
                                    <div class="d-flex align-self-center mr-4">
                                        <span class="u-icon-v2 u-icon-size--xl g-brd-4 g-color-primary g-brd-primary--hover g-rounded-50x">
                                          <i class="fa fa-exclamation"></i>
                                        </span>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h3 class="h4 g-color-black">Observación</h3>
                                        <p class="g-color-gray-dark-v3 mb-0 text-justify">
                                            Para recoger cualquier certificado será imprescindible presentar el <b class="tooltipster g-cursor-info" title="Documento Nacional de Identidad">D.N.I.</b> pasadas 48 horas desde la solucitud online.<br>
                                            En caso de que lo recoja otra persona, deberá presentar autorización y fotocopia del <b class="tooltipster g-cursor-info" title="Documento Nacional de Identidad">D.N.I.</b> solicitante así como el <b class="tooltipster g-cursor-info" title="Documento Nacional de Identidad">D.N.I.</b> propio.
                                        </p>
                                    </div>
                                </article>
                                <!-- End Icon Blocks -->
                            </div>
                        </div>
                        <div class="text-center">
                            <a id='contactSubmit' class="btn u-btn-primary g-font-weight-600 g-font-size-13 text-uppercase g-rounded-25 g-py-15 g-px-30" href="javascript: void(0)">Enviar</a>
                        </div>

                    </form>
                    <div class="acierto alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert" style="display:none;" >
                        <button type="button" class="close u-alert-close--light h-100" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media">
                            <span class="d-flex g-mr-10 ">
                              <i class="icon-check g-font-size-25"></i>
                            </span>
                            <span class="media-body align-self-center">
                                <strong>Gracias </strong>. Hemos recibido su solicitud.
                            </span>
                        </div>
                    </div>
                    <div class="error alert alert-dismissible fade show g-bg-red g-color-white rounded-0 g-py-20" role="alert" style="display: none">
                        <button type="button" class="close u-alert-close--light h-100" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="media">
                            <span class="d-flex g-mr-10 g-mt-5">
                              <i class="icon-ban g-font-size-25"></i>
                            </span>
                            <span class="media-body align-self-center">
                                <strong>Lo siento</strong>. Parece que tenemos problemas con el servidor de correo. Prueba más tarde.
                            </span>
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
        $(function () {
            $('.tooltipster').tooltipster({
                theme: 'tooltipster-punk'
            });
            // Variables del form
            var vname = new RegExp(/^([a-zñáéíóú]+[\s]*)+$/);
            var vcaract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            var vnumberform = new RegExp(/^[9|8|7|6]{1}([\d]{2}[-]*){3}[\d]{2}$/);
            var ferror =['#e_name','#e_surname','#e_email','#e_phone','#e_lopd','#e_certificado'];
            var nombre, apellidos, email, telefono, dni, certificado;

            function validarDni(dni) {
                var numero;
                var letr;
                var letra;
                var expresion_regular_dni;

                expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

                if(expresion_regular_dni.test (dni) == true){
                    numero = dni.substr(0,dni.length-1);
                    letr = dni.substr(dni.length-1,1);
                    numero = numero % 23;
                    letra='TRWAGMYFPDXBNJZSQVHLCKET';
                    letra=letra.substring(numero,numero+1);
                    if(letra!=letr.toUpperCase()) {
                        return false;
                    }else{
                        return true;
                    }
                }else{
                    return false;
                }
            }
            function valoresform(){
                nombre = $('#nombre').val().toLowerCase().trim();
                apellidos = $('#apellidos').val().toLowerCase().trim();
                email = $('#email').val().trim();
                telefono = $('#telefono').val().trim();
                dni = $('#dni').val().trim();
                certificado = $('#certificado').val();
            }
            // Validador
            function validar(estado) {
                if(estado=="#e_email"){
                    if(vcaract.test(email)){
                        return true;
                    }
                }else if(estado=="#e_phone"){
                    if(vnumberform.test(telefono)){
                        return true;
                    }
                }else if(estado=='#e_name'){
                    if(vname.test(nombre) && nombre.length > 2){
                        return true;
                    }
                }else if(estado=='#e_surname'){
                    if(vname.test(apellidos) && apellidos.length > 2){
                        return true;
                    }
                }else if(estado=='#e_certificado'){
                    if(certificado){
                        return true;
                    }
                }else if(estado=='#e_lopd'){
                    if($('#lopd ').is(':checked')) {
                        return true;
                    }
                }
            }
            //Enviar mensaje

            //Comprobador KEYDOWN
            $('#lopd').click(function(){
                if($(this).is(':checked')) {
                    $('#e_lopd').hide();
                }
            });
            $('#certificado option').click(function () {
                    $('#e_certificado').hide();
            });
            $('#f-contact input').keyup(function(e){
                valoresform();
                switch (e.target.id) {
                    case 'nombre':
                        if(validar('#e_name')) {
                            $('#e_name').hide();
                        }
                        break;
                    case 'apellidos':
                        if(validar('#e_surname')) {
                            $('#e_surname').hide();
                        }
                        break;
                    case 'email':
                        if(validar('#e_email')) {
                            $('#e_email').hide();
                        }
                        break;
                    case 'telefono':
                        if(validar('#e_phone')) {
                            $('#e_phone').hide();
                        }
                        break;
                    case 'dni':
                        if(validarDni(dni)) {
                            $('#e_dni').hide();
                        }
                        break;
                    case 'lopd':
                        if(validar('#e_lopd')) {
                            $('#e_lopd').hide();
                        }
                        break;
                }
            });
            $(document).on('click','#contactSubmit',function(){
                valoresform();
                if(validar('#e_name') && validar('#e_surname') && validar('#e_email') && validar('#e_phone') && validarDni(dni) && validar('#e_certificado') && validar('#e_lopd')){
                    $('.errores').hide();
                    $.ajax({
                        type: 'POST',
                        url: '/mail/send-contact',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            nombre:nombre,
                            apellidos:apellidos,
                            email: email,
                            telefono:telefono,
                            dni:dni,
                            certificado:certificado
                        },
                        success: function(data){
                            if(data == 'OK'){
                                $('.acierto').toggle();
                                $('#contactSubmit').attr({'id':' '});
                            }else{
                                $('.error').toggle()
                            }
                        }
                    });
                }else {
                    for(var x = 0; x < ferror.length; x++) {
                        if (!validar(ferror[x])) {
                            $(ferror[x]).show();
                        } else {
                            $(ferror[x]).hide();
                        }
                    }
                    if(!validarDni(dni)){
                        $('#e_dni').show();
                    }
                }

            });
        });

    </script>
@endsection