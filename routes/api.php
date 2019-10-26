<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('API')->group(function () {
    Route::apiResources([
        'products' => 'ProductApiController',
        'orders'   => 'OrderApiController',
        'finances' => 'FinanceApiController'
    ]);

    Route::get('buys/{product_id}/with_sold', 'BuyApiController@getWithSold');
});
