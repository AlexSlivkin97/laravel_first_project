<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $data = DB::table('products')->get();
            return view('products.productMain', compact('data'));
        }else{
            $data = DB::table('products')->get();
            return view('products.productMain', compact('data'));
        }
    }
    
    public function productId($id){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $cart = DB::table('carts')
            ->join('users', 'carts.id_user', '=', 'users.id')
            ->join('products', 'carts.id_product', '=', 'products.id')
            ->where('carts.id_user', '=', $id_user)
            ->get();
            $count = count($cart);
            $data = DB::table('products')->where(['id' => $id])->get();
            return view('products.product', compact('data', 'count'));
        }
        else{
            $data = DB::table('products')->where(['id' => $id])->get();
            return view('products.productMain', compact('data'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
