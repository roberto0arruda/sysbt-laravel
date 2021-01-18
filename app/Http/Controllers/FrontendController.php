<?php

namespace App\Http\Controllers;

use App\Support\Http\Controllers\Controller;

class FrontendController extends Controller
{
    // For admin application
    public function admin()
    {
        return view('admin');
    }

    // For public application
    public function app()
    {
        return view('app');
    }
}
