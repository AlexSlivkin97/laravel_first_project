<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class SearchController extends Controller
{
    public function Search (Request $request){
        if($request->input('search') != ''){
            $product = new Products;
            $product->name = $request->input('search');
            $data = DB::table('products')->where('name', '=', $product->name)->get();
            return view('search.search', compact('data'));
        }else{
            return 123;
        }
    }
}
