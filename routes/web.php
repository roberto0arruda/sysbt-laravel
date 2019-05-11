<?php

Route::get('/', function () {
    return view('welcome');
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function() {
    // 
});

Auth::routes();

$this->get('admin', 'Admin\HomeController@index')->name('admin.home');
$this->resource('/products', 'Admin\ProductController');
$this->resource('/finances', 'Admin\FinanceController');
