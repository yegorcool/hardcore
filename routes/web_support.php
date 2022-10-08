<?php

use App\Http\Controllers\Support\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('support.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});
