<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeePreparationController;
use App\Http\Controllers\CoffeeConsumptionController;
use App\Http\Controllers\CoffeePurchaseController;

Route::middleware('auth')->prefix('coffee')->group(function () {
    Route::view('/purchases', 'coffee.purchases.index')->name('coffee.purchases.index');
    Route::view('/consumptions', 'coffee.consumptions.index')->name('coffee.consumptions.index');
    Route::view('/preparations', 'coffee.preparations.index')->name('coffee.preparations.index');
});

Route::middleware('auth')->prefix('coffee/preparations')->name('coffee.preparations.')->group(function () {
    Route::get('/', [CoffeePreparationController::class, 'index'])->name('index');
    Route::get('/create', [CoffeePreparationController::class, 'create'])->name('create');
    Route::post('/', [CoffeePreparationController::class, 'store'])->name('store');
});

Route::middleware('auth')->prefix('coffee/consumptions')->name('coffee.consumptions.')->group(function () {
    Route::get('/', [CoffeeConsumptionController::class, 'index'])->name('index');
    Route::get('/create', [CoffeeConsumptionController::class, 'create'])->name('create');
    Route::post('/', [CoffeeConsumptionController::class, 'store'])->name('store');
});

Route::middleware('auth')->prefix('coffee/purchases')->name('coffee.purchases.')->group(function () {
    Route::get('/', [CoffeePurchaseController::class, 'index'])->name('index');
    Route::get('/create', [CoffeePurchaseController::class, 'create'])->name('create');
    Route::post('/', [CoffeePurchaseController::class, 'store'])->name('store');
});

Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
