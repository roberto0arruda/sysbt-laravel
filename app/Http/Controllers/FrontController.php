<?php

namespace App\Http\Controllers;

use App\Support\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $products = \App\Models\Admin\Product::all();
        return view('welcome', compact('products'));
    }

    public function item($item)
    {
        $product = \App\Models\Admin\Product::where('title', str_replace('_', ' ', $item))->first();

        return view('shop-item', compact('product'));
    }
}
