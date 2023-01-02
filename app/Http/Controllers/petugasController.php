<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengembalian;

class pengembalianController extends Controller
{
    public function buat()
    {
        return view("pengembalian.form-input");
    }

    public function simpan(Request $request)
    {
        $pengembalian = new pengembalian();
        $pengembalian->nama = $request->get("nama");
        $pengembalian->keterangan = $request->get("keterangan");
        $pengembalian->save();

        return redirect(route("tampil_pengembalian", ['id' => $pengembalian->id]));
    }

    public function tampil($id)
    {
        $pengembalian = pengembalian::find($id);

        return view("pengembalian/tampil")->with("pengembalian", $pengembalian);
    }

    public function semua()
    {
        $data = pengembalian::all();
        return view("pengembalian.semua")->with("data", $data);
    }

    public function ubah($id)
    {
        return view("pengembalian.form-edit")->with("id", $id);
    }

    public function update(Request $request, $id)
    {
        $pengembalian = pengembalian::find($id);
        $pengembalian->nama = $request->get("nama");
        $pengembalian->keterangan = $request->get("keterangan");
        $pengembalian->save();

        return redirect(route("tampil_pengembalian", ['id' => $pengembalian->id]));
    }

    public function hapus($id)
    {
        pengembalian::destroy($id);
        return redirect(route('semua_pengembalian'));
    }
}