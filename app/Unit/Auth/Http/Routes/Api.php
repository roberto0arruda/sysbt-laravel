<?php


namespace App\Unit\Auth\Http\Routes;

use App\Support\Http\Routing\RouteFile;

/**
 * --------------------------------------------------------------------------
 * Class Api Routes
 * --------------------------------------------------------------------------
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 * @package App\Unit\Auth\Http\Routes
 */
class Api extends RouteFile
{
    protected function routes()
    {
        $this->router->post('login', 'AuthController@login')->name('login');
        $this->router->post('logout', 'AuthController@logout')->name('logout');
        $this->router->post('refresh', 'AuthController@refresh')->name('refresh');

        $this->router->post('register', 'Api\RegisterController@register')->name('register');
    }
}
