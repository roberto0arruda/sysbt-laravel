<?php

use App\Http\Controllers\Api\BuyController;
use App\Unit\Auth\Http\Controllers\AuthController;
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

Route::prefix('v1')->namespace('Api')->as('api.')->group(function () {

    Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
        Route::post('me', [AuthController::class, 'me'])->name('me');
    });

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResources([
        'products' => 'ProductController',
        'orders'   => 'OrderController',
        'finances' => 'FinanceController'
    ]);

    Route::get('buys/{product_id}/with_sold', [BuyController::class, 'getWithSold'])->name('buys');
});
