<?php

use App\Livewire\BarangCrud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Mahasiswa;

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

// Route untuk mengunduh PDF
Route::post('/jadwal/export', [JadwalController::class, 'exportPdf'])->name('jadwal.exportPdf');
