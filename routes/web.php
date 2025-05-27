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

// Route dashboard masyarakat
Route::view('/masyarakat/dashboard', 'masyarakat.dashboard')->name('masyarakat.dashboard');

// Route pengaduan masyarakat
Route::prefix('masyarakat/pengaduan')->group(function () {
    Route::view('/', 'masyarakat.pengaduan.index')->name('masyarakat.pengaduan.index');
    Route::view('/create', 'masyarakat.pengaduan.create')->name('masyarakat.pengaduan.create');
    Route::view('/{id}', 'masyarakat.pengaduan.show')->name('masyarakat.pengaduan.show');
});
