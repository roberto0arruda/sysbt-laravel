<?php

namespace App\Http\Controllers;

use App\Domain\Users\Models\User;
use App\Support\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */
    public function __invoke()
    {
        return view('client.profile', ['user' => User::findOrFail(auth()->user()->id)]);
    }
}
