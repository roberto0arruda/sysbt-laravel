<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrdersFormRequest;
use App\Models\Admin\Order;
use App\Models\Admin\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Orders';
        $orders = Order::with('product')->get();

        return view('admin.orders.index', compact('title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('title', 'id');

        return view('admin.orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdersFormRequest $request)
    {
        $dataForm['product_id'] = $request->input('product');
        $dataForm += $request->except('_token', 'product');
        $dataForm['type'] = isset($dataForm['customer_id']) ? 'O' : 'I';

        $order = Order::create($dataForm);

        if ($order) {
            Product::find($order->product_id)->stockUp();
            $response = ['success' => true, 'message' => "{$order->id} cadastrado com sucesso"];
        } else {
            $response = ['success' => false, 'message' => 'Falha ao adicionar'];
        }

        if($response['success'])
            return redirect()->route('products.index')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with('payments')->first();

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
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
        $product = Product::find($id);

        $response = $product->sale($request->all());

        if($response['success'])
            return redirect()->route('products.index')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
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
}
