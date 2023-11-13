<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyConverterController;


Route::get('/',[CurrencyConverterController::class,'index'] );

Route::post('/convert', [CurrencyConverterController::class, 'convertCurrency']);
/*
Route::get('/', function () {
    return view('currency_converter');
});

Route::post('/convert', [CurrencyConverterController::class, 'convertCurrency']);


Route::get('/', function () {
    return view('welcome');
});
*/