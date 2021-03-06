<?php

Route::redirect('/shop', '/', 301);
Route::resource('/', 'FrontController');
Route::get('/category/{item}', 'FrontController@item')->name('shop-item');

Route::get('/client', 'ClientController')->middleware(['auth', 'verified'])->name('client');
Auth::routes(['register' => true, 'verify' => false]);
$this->group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'Admin'], function() {
    $this->get('admin', 'HomeController@index')->name('admin.home');
    $this->resource('admin/products', 'ProductController');
    $this->resource('admin/buys', 'BuyController');
    $this->resource('admin/sales', 'SaleController');
    $this->resource('admin/finances', 'FinanceController');
    $this->resource('admin/orders', 'OrderController');
    $this->resource('admin/categories', 'CategoryController');
    $this->resource('admin/users', 'UsersController');
});
