<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SyncController;
use App\Models\Sync;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituteController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});


Route::get('/', [HomeController::class, 'home'])->name('home');

//admin
Route::prefix('dashboard')->group(function () {
    //sync
    Route::prefix('sync')->group(function () {
        Route::get('/add', [SyncController::class, 'index'])->name('sync.add');
        Route::post('/store', [SyncController::class, 'store'])->name('sync.store');
        Route::get('/list/{status?}', [SyncController::class, 'list'])->name('sync.list');
        Route::get('/edit/{id}', [SyncController::class, 'edit'])->name('sync.edit');
        Route::post('/update/{id}', [SyncController::class, 'update'])->name('sync.update');
        Route::get('/delete/{id}', [SyncController::class, 'delete'])->name('sync.delete');
    });
    //institute
    Route::prefix('institute')->group(function(){
        Route::get('list',[InstituteController::class, 'index'])->name('institute.list');
        Route::get('add',[InstituteController::class, 'add'])->name('institute.add');
        Route::post('store',[InstituteController::class, 'store'])->name('institute.store');
        Route::get('edit/{id}',[InstituteController::class, 'edit'])->name('institute.edit');
        Route::post('update{id}',[InstituteController::class, 'update'])->name('institute.update');
        Route::get('delete/{id}',[InstituteController::class, 'delete'])->name('institute.delete');
    });
});
