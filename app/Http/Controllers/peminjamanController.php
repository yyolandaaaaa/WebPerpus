<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\User;
use App\Models\buku;
use Illuminate\Support\Facades\DB;

class peminjamanController extends Controller
{
    public function buatpeminjaman()
    {
        $buku = buku::all();
        $user = User::all();
        return view("peminjaman/form-input")->with(['buku'=> $buku, 'user'=> $user]);
    }

    public function simpanpeminjaman(Request $request)
    {
        $peminjaman = new peminjaman();
        $peminjaman->tanggal_peminjaman = $request->post("tanggal_peminjaman");
        $peminjaman->id_buku = $request->post("id_buku");
        $peminjaman->id_user = $request->post("id_user");
        $peminjaman->save();

        return redirect(route("semua_peminjaman"));
    }

    public function tampilpeminjaman($id){
        $peminjaman = peminjaman::find($id);
        $buku = buku::find($peminjaman->id_buku);
        return view ("/peminjaman/tampil")
        ->with(["peminjaman"=>$peminjaman,"buku"=>$buku]);
    }

    public function semuapeminjaman()
    {
        $peminjaman = DB::table('peminjaman')
        ->join('buku', 'peminjaman.id_buku', '=', 'buku.id')
        ->join('users', 'peminjaman.id_user', '=', 'users.id')
        ->select('peminjaman.*', 'buku.judul_buku', 'peminjaman.tanggal_peminjaman', 'users.name')
        ->get();
        return view("peminjaman/semua")->with("peminjaman", $peminjaman);
    }

    public function ubahpeminjaman($id)
    {
        $data_peminjaman = peminjaman::find($id);
        $data_user_all = user::all();
        $data_buku_all = buku::all();
        return view("peminjaman/form-edit")->with(["data_peminjaman"=> $data_peminjaman,"data_user_all"=> $data_user_all,"data_buku_all"=> $data_buku_all]);
    }

    public function updatepeminjaman(Request $request, $id)
    {
        $peminjaman = peminjaman::find($id);
        $peminjaman->tanggal_peminjaman = $request->post("tanggal_peminjaman");
        $peminjaman->id_buku = $request->post("id_buku");
        $peminjaman->id_user = $request->post("id_user");
        $peminjaman->save();

        return redirect(route("semua_peminjaman"));
    }

    public function hapuspeminjaman($id)
    {
        peminjaman::destroy($id);
        return redirect(route('semua_peminjaman'));
    }
}