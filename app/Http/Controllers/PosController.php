<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $perPage = 25;

        $products = Product::orderBy('name', 'asc')->latest()->paginate($perPage);

        return view('pos.index', compact('products'));
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
        // dd($request);
        // dd('ooo');
        // $validatedData = $request->validate([
        // 'name'  => 'required|alpha_dash|min:2',
        // 'price_eur'  => 'required|numeric|digits_between:0,999',
        // 'price_usa'   => 'nullable|numeric|digits_between:0,999',
        // 'price_brl' => 'nullable|numeric|digits_between:0,999'
        // ]);
        dd($request->all());
        // Product::create($validatedData);

        // return redirect('products')->with('flash_message', 'Cadastro realizado com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // dd('ooo');
        // $validatedData = $request->validate([
        // 'name'  => 'required|alpha_dash|min:2',
        // 'price_eur'  => 'required|numeric|digits_between:0,999',
        // 'price_usa'   => 'nullable|numeric|digits_between:0,999',
        // 'price_brl' => 'nullable|numeric|digits_between:0,999'
        // ]);
        dd($request->all());
        // Product::create($validatedData);

        // return redirect('products')->with('flash_message', 'Cadastro realizado com sucesso!');
    }
}
