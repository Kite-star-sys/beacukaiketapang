<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/aksiLogin', 'aksiLogin');
    Route::get('/registrasi', 'registrasi');
    Route::post('/aksiRegistrasi', 'aksiRegistrasi');
});

Route::prefix('kepala_kantor')->middleware('auth:admin')->group(function(){
    require __DIR__.'/KepalaKantor.php';
});
Route::prefix('staf_kantor')->middleware('auth:admin')->group(function(){
    require __DIR__.'/Staf.php';
});
Route::prefix('instansi')->middleware('auth:instansi')->group(function(){
    require __DIR__.'/Instansi.php';
});
