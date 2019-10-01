<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Http\Requests\Admin\ProductsStoreRequest;
use App\Http\Requests\Admin\ProductsUpdateRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

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

        return view('admin.products.index', compact('products'));
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
            if (filled($request->input('value'), $request->has('data'))) {
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

        $product = Product::find($id);

        return view('admin.products.show', compact('product', 'title'));
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
