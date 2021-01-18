<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Buy;
use App\Support\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get list resource not sold.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getWithSold($product_id)
    {
        $buys = Buy::where('product_id', $product_id)->with('sale')->get()
            // ->filter(function ($item) {
            //     return empty($item->sale);
            // })
        ;

        return response()->json($buys);
    }
}
