<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('calculatriceView');
});

Route::post('/calculer', function () {
    return view('calculatriceView');
});
