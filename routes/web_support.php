<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('support.hello');
});