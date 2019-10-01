<?php

Route::redirect('/shop', '/', 301);
Route::resource('/', 'FrontController');
// Route::get('/{item}', 'FrontController@item');

Route::get('/client', 'ClientController')->middleware(['auth', 'verified'])->name('client');
Auth::routes(['register' => false]);
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function() {
    $this->get('admin', 'HomeController@index')->name('admin.home');
    $this->resource('admin/products', 'ProductController');
    $this->resource('admin/finances', 'FinanceController');
    $this->resource('admin/orders', 'OrderController');
    $this->resource('admin/categories', 'CategoryController');
    $this->resource('admin/users', 'UsersController');
});

