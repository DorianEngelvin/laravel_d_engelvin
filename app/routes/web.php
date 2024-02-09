<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TeamController;

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


Route::get('/add-team', [TeamController::class, 'addteam'])->name("add-team"); 

Route::match(array('GET','POST'), 'add-password', [PasswordController::class, 'addPassword'])->name('add-password'); 

Route::get('/passwords', [PasswordController::class, 'index'])->name('passwords.index');

Route::get('/get', [PasswordController::class, 'GetPassword'])->name('route.form');

Route::get('/get', [TeamController::class, 'store'])->name('teams.store');

Route::get('/', [MainController::class, 'welcome'])->name("welcome");

Route::get('/dashboard', [MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/registration', 'registration')->name('registration');
    Route::get('/login', 'login')->name('login');
});

require __DIR__.'/auth.php';
