<?php
namespace App\Http\Controllers\Admin;


use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller{

    public function ProductIndex(){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $products = DB::table('products')->get();
                return view('admin.products', compact('products'));
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для доступа к этой странице</h3>';
    }
    public function ProductDelete($id){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                DB::table('products')->where('id', '=', $id)->delete();
                return redirect('admin/products');
            }
        }
    }
    public function ProductUpdate($id){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $product = DB::table('products')->where('id', '=', $id)->get();
                return view('admin.productUpdate', compact('product'));
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для доступа к этой странице</h3>';
    }
    public function Update(Request $request){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $product = new Products;
                $product->id = $request->input('id');
                $product->name = $request->input('name');
                $product->processor = $request->input('processor');
                $product->RAM = $request->input('RAM');
                $product->memory = $request->input('memory');
                $product->battery = $request->input('battery');
                $product->price = $request->input('price');
                $product->availability = $request->input('availability');
                DB::table('products')->where('id', '=', $product->id)
                ->update([
                    'name' => $product->name,
                    'processor' => $product->processor,
                    'RAM' => $product->RAM,
                    'memory' => $product->memory,
                    'battery' => $product->battery,
                    'price' => $product->price,
                    'availability' => $product->availability]);
                return redirect('admin/products');
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для выполнения этого действия</h3>';
    }
}