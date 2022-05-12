<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function CartSave(Request $request)
    {
        if(Auth::check()){
            /* $this->validate($request, [
                'id_product' => 'required'
            ]); */
            $id_user = Auth::user()->id;
            $cart = new carts;
            $cart->id_user = $id_user;
            $cart->id_product = $request->input('id_product');
            $cart->save();
            return redirect('/'.$cart->id_product);
        }
    }

    public function CartIndex()
    { 
        /* users.name, users.email, products.name AS productName, products.processor FROM carts JOIN users ON carts.id_user = users.id JOIN products ON carts.id_product = product.id */
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $cart = DB::table('carts')
            ->join('users', 'carts.id_user', '=', 'users.id')
            ->join('products', 'carts.id_product', '=', 'products.id')
            ->where('carts.id_user', '=', $id_user)
            ->select('carts.id AS cartsId', 'users.name', 'users.id', 'users.email', 'products.price', 'products.quantity','products.name AS productName')
            ->get();
            $count = count($cart);
            $sum = $cart->sum('price');
            return view('cart.add', compact('cart', 'count', 'sum'));
        }
        
    }
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
        //   
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $cart = new carts;
            $cart->id_user = $id_user;
            $cart->id = $request->input('id');
            DB::table('carts')->where('carts.id_user', '=', $id_user)->where('carts.id', '=', $cart->id)->delete();
            return redirect('user/cart');
        }
    }
    public function destroyAll(carts $carts)
    {
        if(Auth::check()){
            $id_user = Auth::user()->id;
            DB::table('carts')->where('carts.id_user', '=', $id_user)->delete();
            return redirect('admin/users');
        }
        return 123;
    }
}
