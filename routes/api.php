<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api')->group(function () {

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResources([
        'products' => 'ProductController',
        'orders'   => 'OrderController',
        'finances' => 'FinanceController'
    ]);

    Route::get('buys/{product_id}/with_sold', 'BuyController@getWithSold');
});
