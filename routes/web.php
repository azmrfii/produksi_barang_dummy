<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SupplierController;
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

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::resource('barang', BarangController::class);
    Route::post('tambah', [BarangController::class, 'tambah'])->name('detailbarang.tambah');
    
    Route::resource('supplier', SupplierController::class);
    Route::resource('detailbarang', DetailBarangController::class);
    Route::resource('requestbarang', RequestController::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});