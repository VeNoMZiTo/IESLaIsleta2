<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserGeneralProvider extends ServiceProvider
{
    public function boot(Request $request)
    {
        $usuario = $request->user();
        View::share('prueba',$request);
    }
}
