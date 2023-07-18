<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {

    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/pages', [PageController::class, 'insert'])->name('pages.insert');
    Route::put('/pages', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{id}', [PageController::class, 'delete'])->name('pages.delete');

});