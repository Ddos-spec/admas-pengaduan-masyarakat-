<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Masyarakat\DashboardController;
use App\Http\Controllers\Masyarakat\PengaduanController;

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
})->name('welcome');

// Rute Otentikasi Masyarakat
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');
});

// Rute Masyarakat (Perlu Login)
Route::middleware(['auth:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengaduan', PengaduanController::class)->except(['show']); // 'show' mungkin akan dibuat terpisah jika ada detail pengaduan
    // Anda bisa menambahkan route lain untuk masyarakat di sini
});

// Fallback route jika pengguna mencoba mengakses /home (default Laravel auth)
Route::get('/home', function () {
    if (Auth::guard('masyarakat')->check()) {
        return redirect()->route('masyarakat.dashboard');
    }
    // Jika ada guard lain (misal admin), arahkan ke dashboardnya
    // if (Auth::guard('admin')->check()) { 
    //     return redirect()->route('admin.dashboard');
    // }
    return redirect()->route('login');
});

// Route untuk login masyarakat
Route::view('/login', 'auth.login')->name('login');

// Route group untuk masyarakat (middleware auth:masyarakat)
Route::middleware(['auth:masyarakat'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Masyarakat\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pengaduan', App\Http\Controllers\Masyarakat\PengaduanController::class);
});
