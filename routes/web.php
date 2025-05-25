<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'welcome');

Route::prefix('coffee')->group(function () {
    Route::view('/purchases', 'coffee.purchases.index')->name('coffee.purchases.index');
    Route::view('/consumptions', 'coffee.consumptions.index')->name('coffee.consumptions.index');
    Route::view('/preparations', 'coffee.preparations.index')->name('coffee.preparations.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
