<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        try {
            return Product::create($request->all())->refresh();
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return ['message' => $e->getMessage()];
            }

            return ['message' => 'Erro ao criar produto'];
        }
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent(); // 204 - No Content
    }
}
