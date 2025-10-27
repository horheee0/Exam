<?php

use App\Http\Controllers\MachineryController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('machineries', MachineryController::class);
Route::resource('rentals', RentalController::class);

