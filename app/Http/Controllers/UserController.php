<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;//Import model user
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function tampil(){
        $data_user = User::all();
        return view("users/tampil-user")
        ->with("data_user", $data_user);
    }

    public function formInput(){ // hanya tampilan form
        return view("users/form");
    }
    public function homeUser(){ // hanya tampilan form
        return view("home_user");
    }
    
    public function register(){ // hanya tampilan form
        return view("register");
    }

    public function register_simpan(UserRequest $request){
        $user = new User();
        $user->name = $request->get("name");
        $user->password = $request->get("password");
        $user->jurusan = $request->get("jurusan");
        $user->jenis_kelamin = $request->get("jenis_kelamin");
        $user->notelp = $request->get("notelp");
        $user->alamat = $request->get("alamat");
        $user->level    = $request->get("level");
        $user->save();

        return redirect(route("login"));
        // return "Data Telah Disimpan";
    }
    
    public function formLogin(){ // hanya tampilan form
        return view("form-login");
    }
    public function formEdit($id){
        $user = User::find($id);
        return view("users/form-update")->with(["id"=> $id,'user'=>$user]);
    }
    public function simpan(UserRequest $request){
        $user = new User();
        $user->name = $request->get("name");
        $user->password = $request->get("password");
        $user->jurusan = $request->get("jurusan");
        $user->jenis_kelamin = $request->get("jenis_kelamin");
        $user->notelp = $request->get("notelp");
        $user->alamat = $request->get("alamat");
        $user->level    = $request->get("level");
        $user->save();

        return redirect(route("user_all"));
        // return "Data Telah Disimpan";
    }

    public function update(UserRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->get("name");
        $user->password = $request->get("password");
        $user->jurusan = $request->get("jurusan");
        $user->jenis_kelamin = $request->get("jenis_kelamin");
        $user->notelp = $request->get("notelp");
        $user->alamat = $request->get("alamat");
        $user->level    = $request->get("level");
        $user->save();  

        return redirect(route("user_all"));
        // return "Data Telah Disimpan";
    }

    public function hapus($id) {
        User::destroy($id);
        return redirect(route("user_all"));
    }

    public function user_show($id){
        $data_user = User::find($id);
        return view ("users/usershow")
        ->with("data_user",$data_user);
    }
}