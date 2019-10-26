<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Buy;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $buy = Buy::create($request->all());

            if ($buy) {
                $product = \App\Models\Admin\Product::find($request->product_id);
                $product->stockUp();
            }

            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('products.index')->with('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function edit(Buy $buy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Buy  $buy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        //
    }
}
