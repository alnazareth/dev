<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyConverterController;


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


Route::get('/', function () {
    return view('currency_converter');
});

Route::post('/convert', [CurrencyConverterController::class, 'convertCurrency']);

/*
Route::get('/', function () {
    return view('welcome');
});
*/