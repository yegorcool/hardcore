<?php

use App\Http\Controllers\Buyer\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('buyer.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});
