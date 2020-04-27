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

Route::prefix('v1')->namespace('API')->group(function () {

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthApiController@login');
        Route::post('logout', 'AuthApiController@logout');
        Route::post('refresh', 'AuthApiController@refresh');
        Route::post('me', 'AuthApiController@me');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResources([
        'products' => 'ProductApiController',
        'orders'   => 'OrderApiController',
        'finances' => 'FinanceApiController'
    ]);

    Route::get('buys/{product_id}/with_sold', 'BuyApiController@getWithSold');
});
