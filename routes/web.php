<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop', ['products' => \App\Models\Admin\Product::all()]);
});

Route::get('/category/{item}', 'FrontController@item')->name('shop-item');
Route::get('/client', 'ClientController')->middleware(['auth'])->name('client');

Route::group(['middleware' => ['auth', 'isAdmin', 'verified'], 'namespace' => 'Admin'], function () {
    Route::get('/admin/dashboard', 'HomeController@index')->name('admin.home');
    Route::resource('admin/products', 'ProductController');
    Route::resource('admin/buys', 'BuyController');
    Route::resource('admin/sales', 'SaleController');
    //     $this->resource('admin/finances', 'FinanceController');
    //     $this->resource('admin/orders', 'OrderController');
    Route::resource('admin/categories', 'CategoryController');
    //     $this->resource('admin/users', 'UsersController');

    Route::any('admin/planos/search', 'PlanSearchController')->name('plans.search');
    Route::resource('admin/planos', 'PlanController')->names('plans')->parameters(['planos' => 'plan']);
});

// For admin application
//Route::get('/admin{any}', 'FrontendController@admin')->where('any', '.*');

// For public application
//Route::any('/{any}', 'FrontendController@app')->where('any', '^(?!api).*$');
