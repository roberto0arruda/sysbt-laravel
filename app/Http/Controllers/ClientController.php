<?php

namespace App\Http\Controllers;

use App\Domain\Users\User;

class ClientController extends Controller
{
    /**
    * Show the profile for the given user.
    *
    * @param  int  $id
    * @return View
    */
    public function __invoke()
    {
        return view('client.profile', ['user' => User::findOrFail(auth()->user()->id)]);
    }
}
