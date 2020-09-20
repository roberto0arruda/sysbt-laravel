<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            return Product::create($request->all())->refresh();
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(['msg' => $e->getMessage()]);
            }

            return response()->json(['msg' => 'Erro ao criar produto']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Product|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = Product::find($id);

        return $product ?? response()->json(['message' => 'Not Found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return Product
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();

            return response()->json(['message' => 'Deleted Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}
