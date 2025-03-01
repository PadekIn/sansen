<?php

use App\Http\Controllers\StandarController;
use Illuminate\Support\Facades\Route;

Route::prefix('main')->group(function() {

    Route::prefix('standar')->group(function(){
        Route::get('/', [StandarController::class, 'index'])->name('main.standar');
        Route::get('/create', [StandarController::class, 'create'])->name('main.standar.create');
        Route::post('/store', [StandarController::class, 'store'])->name('main.standar.store');
        Route::get('/edit/{id}', [StandarController::class, 'edit'])->name('main.standar.edit');
        Route::patch('/update/{id}', [StandarController::class, 'update'])->name('main.standar.update');
        Route::delete('/delete/{id}', [StandarController::class, 'destroy'])->name('main.standar.delete');
    });
});
