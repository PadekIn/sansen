<?php

use App\Http\Controllers\PopulasiController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\ActualController;
use App\Http\Controllers\PerkembanganController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::prefix('main')->group(function() {

    Route::prefix('populasi')->group(function() {
        Route::get('/', [PopulasiController::class, 'index'])->name('main.populasi');
        Route::get('/create', [PopulasiController::class, 'create'])->name('main.populasi.create');
        Route::post('/store', [PopulasiController::class, 'store'])->name('main.populasi.store');
        Route::get('/edit/{id}', [PopulasiController::class, 'edit'])->name('main.populasi.edit');
        Route::patch('/update/{id}', [PopulasiController::class, 'update'])->name('main.populasi.update');
        Route::get('/delete/{id}', [PopulasiController::class, 'destroy'])->name('main.populasi.delete');
    });

    Route::prefix('standar')->group(function(){
        Route::get('/', [StandarController::class, 'index'])->name('main.standar');
        Route::get('/create', [StandarController::class, 'create'])->name('main.standar.create');
        Route::post('/store', [StandarController::class, 'store'])->name('main.standar.store');
        Route::get('/edit/{id}', [StandarController::class, 'edit'])->name('main.standar.edit');
        Route::patch('/update/{id}', [StandarController::class, 'update'])->name('main.standar.update');
        Route::get('/delete/{id}', [StandarController::class, 'destroy'])->name('main.standar.delete');
    });

    Route::prefix('actual')->group(function() {
        Route::get('/', [ActualController::class, 'index'])->name('main.actual');
        Route::get('/create', [ActualController::class, 'create'])->name('main.actual.create');
        Route::post('/store', [ActualController::class, 'store'])->name('main.actual.store');
        Route::get('/edit/{id}', [ActualController::class, 'edit'])->name('main.actual.edit');
        Route::patch('/update/{id}', [ActualController::class, 'update'])->name('main.actual.update');
        Route::get('/delete/{id}', [ActualController::class, 'destroy'])->name('main.actual.delete');
    });

    Route::prefix('pakan')->group(function() {
        Route::get('/', [PakanController::class, 'index'])->name('main.pakan');
        Route::get('/create', [PakanController::class, 'create'])->name('main.pakan.create');
        Route::post('/store', [PakanController::class, 'store'])->name('main.pakan.store');
        Route::get('/edit/{id}', [PakanController::class, 'edit'])->name('main.pakan.edit');
        Route::patch('/update/{id}', [PakanController::class, 'update'])->name('main.pakan.update');
        Route::get('/delete/{id}', [PakanController::class, 'destroy'])->name('main.pakan.delete');
    });

    Route::prefix('perkembangan')->group(function() {
        Route::get('/', [PerkembanganController::class, 'index'])->name('main.perkembangan');
        Route::get('/create', [PerkembanganController::class, 'create'])->name('main.perkembangan.create');
        Route::post('/store', [PerkembanganController::class, 'store'])->name('main.perkembangan.store');
        Route::get('/edit/{id}', [PerkembanganController::class, 'edit'])->name('main.perkembangan.edit');
        Route::patch('/update/{id}', [PerkembanganController::class, 'update'])->name('main.perkembangan.update');
        Route::get('/delete/{id}', [PerkembanganController::class, 'destroy'])->name('main.perkembangan.delete');
    });

    Route::get('/laporan', [LaporanController::class, 'index'])->name('main.laporan');
});
