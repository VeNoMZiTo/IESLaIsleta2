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
        try{
            Mail::to("jonathanlujan7@gmail.com")
                ->send(new SendEmail($objDemo));
            return 'OK';
        }catch(\Exception $e){
            return 'FAIL';
        }

    }

}
