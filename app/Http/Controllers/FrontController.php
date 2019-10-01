<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = \App\Models\Admin\Product::all();
        return view('welcome', compact('products'));
    }

    public function item($item)
    {
        $product = \App\Models\Admin\Product::where('title', str_replace('-', ' ', $item))->first();

        return view('welcome', compact('product'));
    }
}
