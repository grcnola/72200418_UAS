<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller{
    public function user(){
        $user = User::paginate(10);
        return view('user', ['user'=>$user]);
    }

    public function formUser(){
        return view('formUser');
    }

    public function saveUser(Request $request){
        User::create([
            'nik_user'=>$request->nik_user,
            'nama_user'=>$request->nama_user,
            'no_hp'=>$request->no_hp,
            'password'=>md5($request->password)
        ]);
        return redirect('/user')->with('alertCreate', 'Data Berhasil Ditambahkan');
    }

    public function login(){
        return view('login');
    }

    public function checkLogin(Request $request){
        $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('no_hp', $request->no_hp)
                    ->where('password',md5($request->password))
                    ->first();
        Auth::login($user);
        return redirect('/mahasiswa/mahasiswa');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function formupdateUser($id){
        $user = User::find($id);
        return view('updateUser', ['user' => $user]);
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        $user->nik_user = $request->nik_user;
        $user->nama_user = $request->nama_user;
        $user->no_hp = $request->no_hp;
        $user->password = $request->password;
        $user->save();

        return redirect('/user')->with('alertUpdate', 'Data Berhasil Diubah');
    }

    public function deleteUser($id){
        $user = user::find($id);
        $user->delete();
        
        return redirect('/user')->with('alertDelete', 'Data Berhasil Dihapus');
    }
    
}