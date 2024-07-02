<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staf\DashboardController;
use App\Http\Controllers\Staf\InstansiController;
use App\Http\Controllers\Staf\PengajuanController;


Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
});


Route::prefix('instansi')->group(function(){
    Route::controller(InstansiController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{instansi}', 'update');
    });
});
Route::prefix('surat')->group(function(){
    Route::controller(PengajuanController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/ambilPersayaraan/{id}', 'ambilPersayaraan');
        Route::post('/store', 'store');
        Route::post('/kirim/{id}', 'kirim');
        Route::post('/terima/{id}', 'terima');
        Route::post('/tangguhkan/{id}', 'tangguhkan');
        Route::post('/verifikasi/{id}', 'verifikasi');
        Route::get('/lihat/{id}', 'lihat');
    });
});



