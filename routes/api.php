<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\Paket_produkController;
use App\Http\Controllers\Level_hargaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produk',[ProdukController::class,'index']);
Route::get('/produk/{id}',[ProdukController::class,'cari']);
Route::get('/produk/cari/{nama}',[ProdukController::class,'carinama']);
Route::post('/produk/tambah',[ProdukController::class,'tambah']);
Route::put('/produk/edit/{id}',[ProdukController::class,'ubah']);
Route::delete('/produk/delete/{id}',[ProdukController::class,'hapus']);
Route::delete('/produk/restore/{id}',[ProdukController::class,'restore']);

Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/kategori/{id}',[KategoriController::class,'cari']);
Route::get('/kategori/cari/{nama}',[KategoriController::class,'carinama']);
Route::post('/kategori/tambah',[KategoriController::class,'tambah']);
Route::put('/kategori/edit/{id}',[KategoriController::class,'ubah']);
Route::delete('/kategori/delete/{id}',[KategoriController::class,'hapus']);
Route::delete('/kategori/restore/{id}',[KategoriController::class,'restore']);

Route::get('/karyawan',[KaryawanController::class,'index']);
Route::get('/karyawan/{id}',[KaryawanController::class,'cari']);
Route::get('/karyawan/cari/{nama}',[KaryawanController::class,'carinama']);
Route::post('/karyawan/tambah',[KaryawanController::class,'tambah']);
Route::put('/karyawan/edit/{id}',[KaryawanController::class,'ubah']);
Route::delete('/karyawan/delete/{id}',[KaryawanController::class,'hapus']);
Route::delete('/karyawan/restore/{id}',[KaryawanController::class,'restore']);

Route::get('/lokasi',[LokasiController::class,'index']);
Route::get('/lokasi/{id}',[LokasiController::class,'cari']);
Route::get('/lokasi/cari/{nama}',[LokasiController::class,'carikabupaten']);
Route::get('/lokasi/cari/{nama}',[LokasiController::class,'cariprovinsi']);
Route::post('/lokasi/tambah',[LokasiController::class,'tambah']);
Route::put('/lokasi/edit/{id}',[LokasiController::class,'ubah']);
Route::delete('/lokasi/delete/{id}',[LokasiController::class,'hapus']);
Route::delete('/lokasi/restore/{id}',[LokasiController::class,'restore']);

Route::get('/pages',[PagesController::class,'index']);
Route::get('/pages/{id}',[PagesController::class,'cari']);
Route::get('/pages/cari/{nama}',[PagesController::class,'carinama']);
Route::post('/pages/tambah',[PagesController::class,'tambah']);
Route::put('/pages/edit/{id}',[PagesController::class,'ubah']);
Route::delete('/pages/delete/{id}',[PagesController::class,'hapus']);
Route::delete('/pages/restore/{id}',[PagesController::class,'restore']);

Route::get('/paket',[PaketController::class,'index']);
Route::get('/paket/{id}',[PaketController::class,'cari']);
Route::get('/paket/cari/{nama}',[PaketController::class,'carinama']);
Route::post('/paket/tambah',[PaketController::class,'tambah']);
Route::put('/paket/edit/{id}',[PaketController::class,'ubah']);
Route::delete('/paket/delete/{id}',[PaketController::class,'hapus']);
Route::delete('/paket/restore/{id}',[PaketController::class,'restore']);

Route::get('/paket_produk',[Paket_produkController::class,'index']);
Route::get('/paket_produk/{id}',[Paket_produkController::class,'cari']);
Route::get('/paket_produk/cari/{nama}',[Paket_produkController::class,'carinama']);
Route::post('/paket_produk/tambah',[Paket_produkController::class,'tambah']);
Route::put('/paket_produk/edit/{id}',[Paket_produkController::class,'ubah']);
Route::delete('/paket_produk/delete/{id}',[Paket_produkController::class,'hapus']);
Route::delete('/paket_produk/restore/{id}',[Paket_produkController::class,'restore']);

Route::get('/level_harga',[Level_hargaController::class,'index']);
Route::get('/level_harga/{id}',[Level_hargaController::class,'cari']);
Route::get('/level_harga/cari/{nama}',[Level_hargaController::class,'carinama']);
Route::post('/level_harga/tambah',[Level_hargaController::class,'tambah']);
Route::put('/level_harga/edit/{id}',[Level_hargaController::class,'ubah']);
Route::delete('/level_harga/delete/{id}',[Level_hargaController::class,'hapus']);
Route::delete('/level_harga/restore/{id}',[Level_hargaController::class,'restore']);

// Route::get('/produk/all',[ProdukController::class,'all']);

// Route::post('/produk/tambah/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}',[ProdukController::class,'tambah']);
// Route::put('/produk/edit/{id}/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}',[ProdukController::class,'ubah']);
// Route::delete('/produk/delete/{id}',[ProdukController::class,'hapus']);
// Route::delete('/produk/restore/{id}',[ProdukController::class,'restore']);
