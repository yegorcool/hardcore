<?php

use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('admin.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});
