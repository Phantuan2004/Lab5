<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/admin')->group(function () {
    Route::get('/search', [MoviesController::class, 'search'])->name('admin.search');
    Route::get('/list', [MoviesController::class, 'index'])->name('admin.index');
    Route::get('/detail/{id}', [MoviesController::class, 'detail'])->name('admin.detail');
    Route::get('/add', [MoviesController::class, 'create'])->name('admin.add');
    Route::post('/add', [MoviesController::class, 'store'])->name('admin.add');
    Route::get('/edit/{id}', [MoviesController::class, 'edit'])->name('admin.edit');
    Route::put('/edit/{id}', [MoviesController::class, 'update'])->name('admin.edit');
    Route::delete('/delete/{id}', [MoviesController::class, 'destroy'])->name('admin.delete');
});
