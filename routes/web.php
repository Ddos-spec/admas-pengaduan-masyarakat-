<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route untuk login masyarakat
Route::view('/login', 'auth.login')->name('login');

// Route group untuk masyarakat (middleware auth:masyarakat)
Route::middleware(['auth:masyarakat'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Masyarakat\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengaduan', App\Http\Controllers\Masyarakat\PengaduanController::class);
});
