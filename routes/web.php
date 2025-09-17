<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;

Route::get('/', [ArsipController::class,'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class,'create'])->name('arsip.create');
Route::get('/arsip/{id}/edit', [ArsipController::class,'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipController::class,'update'])->name('arsip.update');
Route::post('/arsip', [ArsipController::class,'store'])->name('arsip.store');
Route::get('/arsip/{id}', [ArsipController::class,'show'])->name('arsip.show');
Route::get('/arsip/download/{id}', [ArsipController::class,'download'])->name('arsip.download');
Route::delete('/arsip/{id}', [ArsipController::class,'destroy'])->name('arsip.destroy');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('kategori', KategoriController::class); 