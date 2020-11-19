<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendContact(Request $request)
    {
        $objDemo = new \stdClass();
        $objDemo->nombre = $request->input('nombre');
        $objDemo->apellidos = $request->input('apellidos');
        $objDemo->email = $request->input('email');
        $objDemo->telefono = $request->input('telefono');
        $objDemo->mensaje = $request->input('mensaje');
        $objDemo->asunto = "Consulta";
        $objDemo->vista = 'email.contact';
        $tipo=$request->input('tipo');
        if($tipo){
            $correo=$tipo;
        }else{
            $correo='info@ieslaisleta.net';
        }
        try{
            Mail::to($correo)
                ->send(new SendEmail($objDemo));
            return 'OK';
        }catch(\Exception $e){
            return 'FAIL';
        }

    }
    public function enviarCertificado(Request $request)
    {
        $objDemo                = new \stdClass();
        $objDemo->nombre        = $request->input('nombre');
        $objDemo->apellidos     = $request->input('apellidos');
        $objDemo->telefono      = $request->input('telefono');
        $objDemo->observaciones = $request->input('observaciones');
        $objDemo->dni           = $request->input('dni');
        $objDemo->email         = $request->input('email');
        $objDemo->certificado   = $request->input('certificado');
        $objDemo->asunto        = "Solicitud de Certificado";
        $objDemo->vista         = 'email.certificado';
        try{
            Mail::to('administracion@ieslaisleta.net')
                ->send(new SendEmail($objDemo));
            return 'OK';
        }catch(\Exception $e){
            return $e;
        }

    }

}
