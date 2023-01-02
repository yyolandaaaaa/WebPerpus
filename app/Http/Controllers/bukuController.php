<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\rak;
use Illuminate\Support\Facades\DB;

class bukuController extends Controller
{
    public function tampilbuku(){
        $data_buku = buku::all();
        return view("buku/semuabuku")
        ->with("data_buku", $data_buku);
    }

    public function buatbuku()
    {
        return view("buku/tambahbuku");
    }

    public function tambahbuku()
    {
        $data_rak_all = rak::all();
        return view("buku/tambahbuku")
        ->with(["data_rak_all" => $data_rak_all]);
    }

    public function simpanbuku(Request $request)
    {   $data_buku = new buku();
        $data_buku->judul_buku = $request->get("judul_buku");
        $data_buku->id_rak  = $request->get("lokasi_buku");
        $data_buku->stok = $request->get("stok");
        $data_buku->save();
        return redirect(route("semuabuku"));
    }

    public function semuabuku()
    {
        $data_buku = DB::table('buku')
            ->join('rak', 'buku.id_rak', '=', 'rak.id')
            ->select('buku.*', 'buku.judul_buku', 'buku.stok', 'rak.nama_rak')
            ->get();
        return view("buku/semuabuku")->with("data_buku", $data_buku);
    }

    public function editbuku($id)
    {
        $data_buku = buku::find($id);
        $data_rak_all = rak::all();
        $data_buku_all = buku::all();
        return view ("buku/editbuku")
        ->with(["data_buku" => $data_buku, "data_rak_all" => $data_rak_all]);
    }

    public function updatebuku(Request $request, $id)
    {
        $data_buku = buku::findOrfail($id);
        $data_buku->judul_buku = $request->judul_buku;
        $data_buku->id_rak = $request->id_rak;
        $data_buku->stok = $request->stok;
        $data_buku->save();
        return redirect(route("semuabuku"));
    }

    public function hapusbuku($id)
    {
        buku::destroy($id);
        return redirect(route('semuabuku'));
    }

    public function showbuku($id){
        $data_buku = buku::find($id);
        return view ("buku/showbuku")
        ->with("data_buku",$data_buku);
    }
}