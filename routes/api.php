<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalMKController;
use App\Http\Controllers\RelasiKelasController;
use App\Http\Controllers\RelasiMKController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::apiResource('dosen', DosenController::class);
    Route::apiResource('prodi', ProdiController::class);
    Route::apiResource('mahasiswa', MahasiswaController::class);
    Route::apiResource('mata-kuliah', MataKuliahController::class);
    Route::apiResource('kelas', KelasController::class)->parameters([
        'kelas' => 'kela',
    ]);
    Route::apiResource('jadwal', JadwalMKController::class);
    Route::apiResource('relasi-kelas', RelasiKelasController::class);
    Route::apiResource('relasi-matkul', RelasiMKController::class);
});
 