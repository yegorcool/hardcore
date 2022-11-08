<?php

use App\Http\Controllers\Buyer\FighterController;
use App\Http\Controllers\Buyer\GameController;
use App\Http\Controllers\Buyer\ReportController;
use App\Http\Controllers\Buyer\TransactionController;
use App\Http\Controllers\Buyer\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('buyer.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});

Route::resource('/fighters',FighterController::class)->only(['index', 'show'])->name('index', 'fighters')->name('show', 'fighter');
Route::resource('/games',GameController::class)->only(['index', 'show'])->name('index', 'games')->name('show', 'game');;
Route::resource('/transactions',TransactionController::class)->name('index', 'transactions')->name('show', 'transaction');;
Route::resource('/videos',VideoController::class);
