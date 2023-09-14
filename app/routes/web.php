<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

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

Route::get('/', function () {
    return redirect('add-password');
});

Route::get('/add-password', function () {
    return view('add-password');
});

Route::get('/get', [PasswordController::class, 'GetPassword'])->name('route.form');