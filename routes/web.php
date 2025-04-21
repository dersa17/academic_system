<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/1', function () {
    return view('demo.file01');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:1'])->group(function() {

    });

    Route::middleware(['role:1,2'])->group(function() {

        Route::get('/dosen', [DosenController::class, 'index'])->name('dosenList');
        Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosenCreate');
        Route::post('/dosen/create', [DosenController::class, 'store'])->name('dosenStore');
        Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosenEdit');
        Route::put('/dosen/edit/{dosen}', [DosenController::class, 'update'])->name('dosenUpdate');
        Route::delete('/dosen/delete/{dosen}', [DosenController::class, 'destroy'])->name('dosenDelete');
        
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswaList');
        
        Route::get('/2', [DemoController::class, 'index']);
        
        
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
        
        Route::get('/', function () {
            return view('starter');
        });

    });


});

require __DIR__.'/auth.php';
