<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPinjam;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/register', [AuthController::class, 'indexRegister']);
Route::post('/register', [AuthController::class, 'storeRegister']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku', [BukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
    Route::put('/buku/{id}/update', [BukuController::class, 'update']);
    Route::get('/buku/tambah', [BukuController::class, 'tambah']);
    Route::delete('/buku/{id}', [BukuController::class, 'delete']);

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::get('/kategori/tambah', [KategoriController::class, 'tambah']);
    Route::get('/kategori/{id}', [KategoriController::class, 'show']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/{id}', [AnggotaController::class, 'tampil']);
    Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit']);
    Route::put('/anggota/{id}/update', [AnggotaController::class, 'update']);
    Route::delete('/anggota/{id}/delete', [AnggotaController::class, 'delete']);

    Route::get('/pinjam', [RiwayatPinjam::class, 'index']);
    Route::post('/pinjam', [RiwayatPinjam::class, 'store']);
    Route::get('/pinjam/create', [RiwayatPinjam::class, 'tambah']);
    Route::get('/pinjam/balik', [RiwayatPinjam::class, 'back']);
    Route::post('/pinjam/balikan', [RiwayatPinjam::class, 'kembalikan']);
});