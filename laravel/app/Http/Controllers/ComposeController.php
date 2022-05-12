<?php
namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComposeController
{
    public function is_admin($view){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->get();
            $view->with('is_admin', $is_admin);
        }else{
            $is_admin = [];
            $view->with('is_admin', $is_admin);
        }
    }
    public function count($view){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $cart = DB::table('carts')->where('carts.id_user', '=', $id_user)->get();
            $count = count($cart);
            $view->with('count', $count);
        }
    }
}?>