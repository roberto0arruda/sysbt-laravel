<?php

use Illuminate\Support\Facades\Route;

// For admin application
Route::get('/admin{any}', 'FrontendController@admin')->where('any', '.*');
// For public application
Route::any('/{any}', 'FrontendController@app')->where('any', '^(?!api).*$');
