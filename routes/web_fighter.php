<?php

use App\Http\Controllers\Fighter\CareerEventController;
use App\Http\Controllers\Fighter\ProfileController;
use App\Http\Controllers\Fighter\ReportController;
use App\Http\Controllers\Fighter\TransactionController;
use App\Http\Controllers\Fighter\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('fighter.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});

Route::resource('/profile', ProfileController::class)->only(['show', 'edit', 'update'])->name('show', 'profile')->name('edit', 'profile.edit')->name('update', 'profile.update');;
Route::resource('/transactions',TransactionController::class)->only(['index', 'show',])->name('index', 'transactions')->name('show', 'transaction');
Route::resource('/videos',VideoController::class)->only(['index', 'show',])->name('index', 'videos')->name('show', 'video');
Route::resource('/career_events',CareerEventController::class);
