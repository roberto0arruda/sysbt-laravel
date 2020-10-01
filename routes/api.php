<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BuyController;
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
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
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
