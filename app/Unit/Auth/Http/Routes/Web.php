<?php


namespace App\Unit\Auth\Http\Routes;

use App\Support\Http\Routing\RouteFile;
use Illuminate\Support\Facades\Auth;

class Web extends RouteFile
{
    protected function routes()
    {
        Auth::routes(['register' => true, 'verify' => true]);
    }
}
