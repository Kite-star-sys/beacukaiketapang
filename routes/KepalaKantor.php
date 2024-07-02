<?php

use App\Http\Controllers\KepalaKantor\DashboardController;
use App\Http\Controllers\KepalaKantor\LayananController;
use App\Http\Controllers\KepalaKantor\StafController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index');
});

Route::prefix('staf')->group(function(){
    Route::controller(StafController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{staf}', 'edit');
        Route::post('/update/{staf}', 'update');
    });
});
Route::prefix('layanan')->group(function(){
    Route::controller(LayananController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{layanan}', 'update');
        Route::get('/show/{layanan}', 'show');
        Route::post('/storePersayaratan/{layanan}', 'storePersayaratan');
        Route::post('/updatePersayaratan/{persayaratan}', 'updatePersayaratan');
    });
});

