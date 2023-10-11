<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminPanel\InvoiceController as AdminInvoiceController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::loginUsingId(9);

Route::get('/', function () {
    return view('welcome');
});


Route::get('invoice', [InvoiceController::class, 'index']);
Route::get('invoice/user/{user}', [AdminInvoiceController::class, 'index']);
