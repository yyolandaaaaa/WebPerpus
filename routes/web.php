<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\rakController;
use App\Http\Controllers\pengembalianController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("login"));
});

Route::get('/home', function () {
    return view('home');
})->name("home");

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name("forgot-password");


Route::get("/login", [SecurityController::class, "formLogin"])->name("login");
Route::post("/proses-login", [SecurityController::class, "prosesLogin"])->name("proses_login");
Route::get("/logout", [SecurityController::class, "logout"])->name("logout");

Route::get("/home-user", [UserController::class, "homeUser"])->name("home_user");
Route::get("/register", [UserController::class, "register"])->name("register");
Route::post("/register/simpan", [UserController::class, "register_simpan"])->name("register_simpan");
Route::get("/user/tampil",[UserController::class,"tampil"])->name("user_all");;
Route::get("/user/input",[UserController::class,"formInput"])->name("user_input");;
Route::post("/user/simpan",[UserController::class,"simpan"])->name("user_simpan");;
Route::get("/user/edit/{id}",[UserController::class,"formEdit"])->name("user_edit");;
Route::put("/user/update/{id}",[UserController::class,"update"])->name("user_update");;
Route::delete("/user/hapus/{id}",[UserController::class,"hapus"])->name("user_hapus");;
Route::get("/user/tampil/{id}",[UserController::class,"user_show"])->name("user_show");;


Route::get("/buku/buat", [bukuController::class, 'buatbuku'])->name("buatbuku");
Route::get("/buku/tampil", [bukuController::class, 'tampilbuku'])->name("tampilbuku");
Route::get("/buku/tambah", [bukuController::class, 'tambahbuku'])->name("tambahbuku");
Route::get("/buku/semua", [bukuController::class, 'semuabuku'])->name("semuabuku");
Route::post("/buku/simpan", [bukuController::class, 'simpanbuku'])->name("simpanbuku");
Route::get("/buku/show/{id}", [bukuController::class, 'showbuku'])->name("showbuku");
Route::get("/buku/edit/{id}", [bukuController::class, 'editbuku'])->name("editbuku");
Route::put("/buku/update/{id}", [bukuController::class, 'updatebuku'])->name("updatebuku");
Route::delete("/buku/hapus/{id}", [bukuController::class, 'hapusbuku'])->name("hapusbuku");

// Route::get("/buatbuku", [bukuController::class, 'buatbuku'])->name("buatbuku");
// Route::get("/tampilbuku", [bukuController::class, 'tampilbuku'])->name("tampilbuku");
// Route::get("/tambahbuku", [bukuController::class, 'tambahbuku'])->name("tambahbuku");
// Route::get("/semuabuku", [bukuController::class, 'semuabuku'])->name("semuabuku");
// Route::post("/simpanbuku", [bukuController::class, 'simpanbuku'])->name("simpanbuku");
// Route::get("/showbuku{id}", [bukuController::class, 'showbuku'])->name("showbuku");
// Route::get("/editbuku{id}", [bukuController::class, 'editbuku'])->name("editbuku");
// Route::put("/updatebuku{id}", [bukuController::class, 'updatebuku'])->name("updatebuku");
// Route::delete("/bukuhapus{id}", [bukuController::class, 'hapusbuku'])->name("hapusbuku");

Route::get("/rak/buat", [rakController::class, 'buatrak'])->name("buatrak");
Route::post("/rak/simpan", [rakController::class, 'simpanrak'])->name("simpanrak");
Route::get("/rak/tampil/{id}", [rakController::class, 'tampilrak'])->name("tampilrak");
Route::get("/rak/semua", [rakController::class, 'semuarak'])->name("semuarak");
Route::get("/rak/ubah/{id}", [rakController::class, 'ubahrak'])->name("ubahrak");
Route::post("/rak/update/{id}", [rakController::class, 'updaterak'])->name("updaterak");
Route::delete("/rak/hapus/{id}", [rakController::class, 'hapusrak'])->name("hapusrak");

Route::get("/peminjaman/buat", [peminjamanController::class, 'buatpeminjaman'])->name("buat_peminjaman");
Route::post("/peminjaman/simpan", [peminjamanController::class, 'simpanpeminjaman'])->name("simpan_peminjaman");
Route::get("/peminjaman/tampil/{id}", [peminjamanController::class, 'tampilpeminjaman'])->name("tampil_peminjaman");
// Route::get("/peminjaman/tampil/{id}", [peminjamanController::class, 'tampilpeminjaman'])->name("tampil_peminjaman");
Route::get("/peminjaman/semua", [peminjamanController::class, 'semuapeminjaman'])->name("semua_peminjaman");
Route::get("/peminjaman/ubah/{id}", [peminjamanController::class, 'ubahpeminjaman'])->name("ubah_peminjaman");
Route::put("/peminjaman/update/{id}", [peminjamanController::class, 'updatepeminjaman'])->name("update_peminjaman");
Route::delete("/peminjaman/hapus/{id}", [peminjamanController::class, 'hapuspeminjaman'])->name("hapus_peminjaman");

Route::get("/pengembalian/buat", [pengembalianController::class, 'buatpengembalian'])->name("buat_pengembalian");
Route::post("/pengembalian/simpan", [pengembalianController::class, 'simpanpengembalian'])->name("simpan_pengembalian");
Route::get("/pengembalian/tampil/{id}", [pengembalianController::class, 'tampilpengembalian'])->name("tampil_pengembalian");
// Route::get("/pengembalian/tampil/{id}", [pengembalianController::class, 'tampilpengembalian'])->name("tampil_pengembalian");
Route::get("/pengembalian/semua", [pengembalianController::class, 'semuapengembalian'])->name("semua_pengembalian");
Route::get("/pengembalian/ubah/{id}", [pengembalianController::class, 'ubahpengembalian'])->name("ubah_pengembalian");
Route::put("/pengembalian/update/{id}", [pengembalianController::class, 'updatepengembalian'])->name("update_pengembalian");
Route::delete("/pengembalian/hapus/{id}", [pengembalianController::class, 'hapuspengembalian'])->name("hapus_pengembalian");