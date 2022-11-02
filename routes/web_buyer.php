<?php

use App\Http\Controllers\Buyer\FighterController;
use App\Http\Controllers\Buyer\GameController;
use App\Http\Controllers\Buyer\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('buyer.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});

Route::resource('/fighters',FighterController::class)->only(['index', 'show'])->name('index', 'fighters')->name('show', 'fighter');
Route::resource('/games',GameController::class)->only(['index', 'show'])->name('index', 'games')->name('show', 'game');;
