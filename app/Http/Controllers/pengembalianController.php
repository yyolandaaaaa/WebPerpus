<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengembalian;
use App\Models\buku;
use App\Models\user;
use Illuminate\Support\Facades\DB;
class pengembalianController extends Controller
{
    public function buatpengembalian()
    {
        $buku = buku::all();
        $user = User::all();
        return view("pengembalian/form-input")->with(['buku'=> $buku, 'user'=> $user]);     
    }

    public function simpanpengembalian(Request $request)
    {
        $pengembalian = new pengembalian();
        $pengembalian->tanggal_pengembalian = $request->get("tanggal_pengembalian");
        $pengembalian->denda = $request->get("denda");
        $pengembalian->id_buku = $request->get("id_buku");
        $pengembalian->id_user = $request->get("id_user");
        $pengembalian->save();

        return redirect(route("semua_pengembalian", ['id' => $pengembalian->id]));
    }

    public function tampilpengembalian($id)
    {
        $pengembalian = pengembalian::find($id);
        return view ("/pengembalian/tampil")
        ->with("pengembalian",$pengembalian);
    }

    public function semuapengembalian()
    {
        $pengembalian = DB::table('pengembalian')
        ->join('buku', 'pengembalian.id_buku', '=', 'buku.id')
        ->join('users', 'pengembalian.id_user', '=', 'users.id')
        ->select('pengembalian.*', 'buku.judul_buku', 'pengembalian.tanggal_pengembalian', 'users.name')
        ->get();
        return view("pengembalian/semua")->with("pengembalian", $pengembalian);
    }

    public function ubahpengembalian($id)
    {
        $data_pengembalian = pengembalian::find($id);
        $data_buku_all = buku::all();
        $data_user_all = user::all();
        return view("pengembalian/form-edit")->with(["data_buku_all"=> $data_buku_all,"data_pengembalian"=> $data_pengembalian,'data_user_all'=>$data_user_all]);
    }

    public function updatepengembalian(Request $request, $id)
    {
        $pengembalian = pengembalian::find($id);
        $pengembalian->tanggal_pengembalian = $request->get("tanggal_pengembalian");
        $pengembalian->denda = $request->get("denda");
        $pengembalian->id_buku = $request->get("id_buku");
        $pengembalian->id_user = $request->get("id_user");
        $pengembalian->save();

        return redirect(route("semua_pengembalian", ['id' => $pengembalian->id]));
    }

    public function hapuspengembalian($id)
    {
        pengembalian::destroy($id);
        return redirect(route('semua_pengembalian'));
    }
}