<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('coffee')->name('coffee.')->group(function () {
    Route::resource('consumptions', App\Http\Controllers\CoffeeConsumptionController::class)->names('consumptions');
    Route::resource('preparations', App\Http\Controllers\CoffeePreparationController::class)->names('preparations');
    Route::resource('purchases', App\Http\Controllers\CoffeePurchaseController::class)->names('purchases');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::resource('/', App\Http\Controllers\ProfileController::class)->only(['edit', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';
