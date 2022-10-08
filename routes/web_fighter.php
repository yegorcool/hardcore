<?php

use App\Http\Controllers\Fighter\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('fighter.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});
