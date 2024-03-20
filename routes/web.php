<?php

use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', UserController::class)
    ->middleware('auth');
Route::resource('obat', ObatController::class)
    ->middleware('auth');
Route::resource('distributor', DistributorController::class)
    ->middleware('auth');

Route::resource('pembelian', PembelianController::class)
    ->middleware('auth');
Route::resource('detailpembelian', DetailPembelianController::class)
    ->middleware('auth');

Route::resource('penjualan', PenjualanController::class)
    ->middleware('auth');
Route::resource('detailpenjualan', DetailPenjualanController::class)
    ->middleware('auth');

// web.php
Route::get('/laporan/pembelian-pdf', [LaporanController::class, 'generatePembelianPDF']);
Route::get('/laporan/penjualan-pdf', [LaporanController::class, 'generatePenjualanPDF']);
