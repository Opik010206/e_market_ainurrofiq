<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::resource('/produk', ProdukController::class);
Route::get('/download', [ProdukController::class, 'download']);
Route::resource('/pemasok', PemasokController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/pelanggan', PelangganController::class);
Route::resource('/user', UserController::class);
Route::resource('/pembelian', PembelianController::class);
Route::get('/download/produk', [ProdukController::class, 'exportData'])->name('export_produk');