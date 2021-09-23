<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomeController;

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






Route::get('/', [LandingPageController::class, 'index']);

Route::get('/Detail/{id_produk}', [AdminController::class, 'Produk']);


Auth::routes();


//------------------------------------------------------ADMININSTRATOR--------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'Dashboard']);

Route::get('/Data_Reseller', [AdminController::class, 'dataReseller']);




//-------------------------------------------------------------------------------------------------Data Produk Route--------------------------------------------------------------------------------------
Route::get('/Data_Produk', [AdminController::class, 'dataProduk'])->name('produk');

Route::get('/Data_Produk/Tambah_Produk', [AdminController::class, 'addDataProduk']);
Route::post('/Data_Produk/Tambah_Produk/Tambah_Data', [AdminController::class, 'insertDataProduk']);

Route::get('/Data_Produk/Edit_Produk/{id_produk}', [AdminController::class, 'editDataProduk']);
Route::post('/Data_Produk/Edit_Produk/{id_produk}', [AdminController::class, 'editProsesProduk']);

Route::get('/Data_Produk/Detail/{id_produk}', [AdminController::class, 'detailProduk']);
