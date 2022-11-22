<?php

use App\Http\Controllers\Support\GameController;
use App\Http\Controllers\Support\ReportController;
use App\Http\Controllers\Support\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('support.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});

Route::resource('/users',UserController::class);
Route::resource('/games',GameController::class);
