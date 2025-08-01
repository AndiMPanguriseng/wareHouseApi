<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\GudangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\MutasiController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// AUTH ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('barang', BarangController::class);
    Route::apiResource('kategori', KategoriController::class);
    Route::get('/kategori/{id}/barang', [KategoriController::class, 'barang']);
    Route::apiResource('gudang', GudangController::class);
    Route::apiResource('supplier', SupplierController::class);
     Route::get('/stok', [MutasiController::class, 'stok']);
    Route::apiResource('mutasi', MutasiController::class)->except(['create', 'edit']);
});
