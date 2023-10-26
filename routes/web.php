<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MinesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');
    Route::get('/show', [FormController::class, 'show'])->name('form.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/mines/create', [minesController::class, 'store'])->name('mines.store');
    Route::view('/mines', 'mines.index')->name('mines.index');
    Route::get('/mines', [minesController::class, 'show'])->name('mines.index');
    Route::post('/mines', [minesController::class, 'store'])->name('files.store');

    Route::get('/mines/create', [minesController::class, 'upload'])->name('upload');
    Route::get('/mines', [minesController::class, 'index'])->name('mines.index');
    Route::post('/mines', [minesController::class, 'store'])->name('mines.store');
});

require __DIR__.'/auth.php';
