<?php

use App\Http\Controllers\Guest\FighterController;
use App\Http\Controllers\Guest\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hello', function () {
    return view('welcome');
});

Route::resource('/fighters',FighterController::class)->only(['index', 'show'])->name('index', 'guest.fighters')->name('show', 'guest.fighter');
Route::resource('/games',GameController::class)->only(['index', 'show'])->name('index', 'guest.games')->name('show', 'guest.game');

require __DIR__.'/auth.php';
