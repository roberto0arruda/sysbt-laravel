<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\ProductsStoreRequest;
use App\Http\Requests\Admin\ProductsUpdateRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Product;
use App\Support\Http\Controllers\Controller;

class ProductController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $customers = Customer::all();

        return view('admin.products.index', compact('products', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Products-create';

        return view('admin.products.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {
        $request = $this->saveFiles($request, 'products');
        $product = Product::create($request->all());

        if ($product) {
            // criar uma ordem com o valor de compra e a data
            $data = $request->all();
            if ($request->comprar) {
                $data['dt_vnc'] = $data['dt_bxa'] = $request->input('data');
                $product->payments()->create($data);
                $product->stock += 1;
                $product->save();
            }
            return redirect()->route('products.index')
                ->with('success', "{$product->title} - cadastrado com sucesso");
        } else {
            return redirect()->back()->with('error', 'Falha ao cadastrar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Products-details';

        $product = Product::where('id', $id)->with('buys')->first();
        $buysWithSale = $product->buys()->with('sale')->get();

        return view('admin.products.show', compact('product', 'buysWithSale', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$title = 'Products-edit';

        $product = Product::find($id);

        return view('admin.products.create-edit', compact('title','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, $id)
    {
        $request = $this->saveFiles($request, 'products');
        $product = Product::findOrFail($id);
        $update = $product->update($request->all());

        if($update) {
            return redirect()->route('products.index')->with('success', "{$product->title} - atualizado com sucesso");
        } else {
            return redirect()->back()->with('error', 'Falha ao atualizar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('excluir produto: ', $id);
    }
}
