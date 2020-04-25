<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop', ['products' => \App\Models\Admin\Product::all()]);
});

Route::get('/category/{item}', 'FrontController@item')->name('shop-item');
Route::get('/client', 'ClientController')->middleware(['auth'])->name('client');

Auth::routes(['register' => true, 'verify' => true]);

Route::group(['middleware' => ['auth', 'isAdmin', 'verified'], 'namespace' => 'Admin'], function () {
    Route::get('/admin', 'HomeController@index')->name('admin.home');
    Route::resource('admin/products', 'ProductController');
    //     $this->resource('admin/buys', 'BuyController');
    //     $this->resource('admin/sales', 'SaleController');
    //     $this->resource('admin/finances', 'FinanceController');
    //     $this->resource('admin/orders', 'OrderController');
    Route::resource('admin/categories', 'CategoryController');
    //     $this->resource('admin/users', 'UsersController');
});
