<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SyncController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

//admin
Route::prefix('dashboard')->group(function () {
    //sync
    Route::prefix('sync')->group(function () {
        Route::get('/add', [SyncController::class, 'index'])->name('sync.add');
        Route::post('/store', [SyncController::class, 'store'])->name('sync.store');
        Route::get('/list', [SyncController::class, 'list'])->name('sync.list');
        Route::get('/edit/{id}', [SyncController::class, 'edit'])->name('sync.edit');
        Route::post('/update/{id}', [SyncController::class, 'update'])->name('sync.update');
        Route::get('/delete/{id}', [SyncController::class, 'delete'])->name('sync.delete');
    });
});
