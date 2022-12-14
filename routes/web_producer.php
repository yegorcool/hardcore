<?php

use App\Http\Controllers\Producer\CareerEventController;
use App\Http\Controllers\Producer\FighterController;
use App\Http\Controllers\Producer\GameController;
use App\Http\Controllers\Producer\ReportController;
use App\Http\Controllers\Producer\SocialController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('producer.hello');
});
Route::middleware(['welcome'])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
});
Route::resource('/fighters',FighterController::class);
Route::resource('/games',GameController::class);
Route::resource('/career_events',CareerEventController::class);
Route::resource('/socials',SocialController::class);
