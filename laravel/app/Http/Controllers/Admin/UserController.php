<?php
namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserIndex(){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $users = DB::table('users')->get();
                return view('admin.users', compact('users'));
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для доступа к этой странице</h3>';
    }
    public function UserDelete($id){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                DB::table('users')->where('id', '=', $id)->delete();
                return redirect('admin/users');
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для доступа к этой странице</h3>';
    }
        
    public function UserUpdate($id){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $users = DB::table('users')->where('id', '=', $id)->get();
                return view('admin.userUpdate', compact('users'));
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для доступа к этой странице</h3>';
    }
    public function Update(Request $request){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $user = new User;
                $user->id = $request->input('id');
                $user->name = $request->input('Name');
                $user->email = $request->input('Email');
                DB::table('users')->where('id', '=', $user->id)
                ->update(['name' => $user->name, 'email' => $user->email]);
                return redirect('admin/users');
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для выполнения этого действия</h3>';
    }
    public function AddUserGet(){
        return view('admin.addUser');
    }
    public function AddUserPost (Request $request){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $is_admin = DB::table('users')->where('id', '=', $id_user)->select('role')->get();
            if($is_admin[0]->role == 1){
                $user = new User;
                $name = $user->name = $request->input('name');
                $email = $user->email = $request->input('email');
                $password = $user->password = $request->input('password');
                if(isset($name) && isset($email) && isset($password)){
                    $password = Hash::make($password);
                    DB::insert('insert into users (name, email, password) values(:name, :email, :password)', ['name' => $name, 'email'=>$email, 'password'=>$password]);
                    return redirect('admin/users');
                }
            }
        }
        return '<h3 style="text-align:center;">У вас недостаточно прав для выполнения этого действия</h3>';
    }
}?>