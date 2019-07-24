<?php

Route::resource('/', 'FrontController');
// Route::get('/{item}', 'FrontController@item');

Route::get('settings/user', 'ShowProfile')->middleware(['auth', 'verified']);
Auth::routes();
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function() {
    $this->get('admin', 'HomeController@index')->name('admin.home');
    $this->resource('admin/products', 'ProductController');
    $this->resource('admin/finances', 'FinanceController');
});

