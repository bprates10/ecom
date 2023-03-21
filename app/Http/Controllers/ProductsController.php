<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Psy\Util\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        // $keyword = $request->get('Procurar');
        $perPage = 25;

        // if (!empty($keyword)) {
        //     $products = Product::where('name', 'LIKE', "%$keyword%")
        //         ->orWhere('mail', '=', "$keyword")
        //         ->latest()->paginate($perPage);
        // } else {
        $products = Product::orderBy('name', 'asc')->latest()->paginate($perPage);
        // }
        // $products = [];
        // dd($products);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|min:2',
            'price_eur'  => 'required|numeric',
            'price_usa'   => 'nullable|numeric',
            'price_brl' => 'nullable|numeric'
        ]);
        Product::create($validatedData);

        return redirect('products')->with('flash_message', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $requestData = $request->all();

        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name'  => 'required|min:2',
            'price_eur'  => 'required|numeric|digits_between:0,999',
            'price_usa'   => 'nullable|numeric|digits_between:0,999',
            'price_brl' => 'nullable|numeric|digits_between:0,999'
        ]);

        $product->update($validatedData);

        return redirect('products')->with('flash_message', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('products')->with('flash_message', 'Product removed successfully!');
    }
}
