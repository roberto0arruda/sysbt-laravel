<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Http\Requests\Admin\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $dataForm = $request->except('_token');

        $product = Product::create($dataForm);

        if ($product) {
            $response = ['success' => true, 'message' => "{$product->title} cadastrado com sucesso"];
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $name = $product->id.kebab_case($product->title);
                $extension = $request->image->extension();
                $fileName = "{$name}.{$extension}";
                $product->image = $fileName;
                $upload = $request->image->storeAs('products', $fileName);
                if(!$upload)
                    $response['message'] .= ' - Falha ao salvar imagem';
                else
                    $product->save();
            }
        } else {
            $response = ['success' => false, 'message' => 'Falha ao cadastrar.'];
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
