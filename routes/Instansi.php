<?php

use App\Http\Controllers\Instansi\DashboardController;
use App\Http\Controllers\Instansi\PengajuanController;
use App\Http\Controllers\Instansi\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
});
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index');
});

Route::prefix('pengajuan')->group(function(){
    Route::controller(PengajuanController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/ambilPersyaratan/{id}', 'ambilPersyaratan');
    });
});



