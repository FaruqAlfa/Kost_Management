<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\LoginLogoutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// routes/web.php
Route::get('/', function () {
    $cresidential = Auth::user();
    if (!$cresidential) {
        return redirect()->route('login');
    } elseif ($cresidential->role == 'admin') {
        return Auth::user();
    } elseif ($cresidential->role == 'user') {
        return Auth::user();
    }
});

Route::get('/logout', [LoginLogoutController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginLogoutController::class, 'showLoginForm'])->name('login');
    Route::post('/loginForm', [LoginLogoutController::class, 'login'])->name('loginForm');
});


# hanya controller yang bisa di akses oleh admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'dashboard'])->name('admin.dashboard');
});



Route::middleware('user')->group(function () {
    Route::get('/user/dashboard', [DashboardUsersController::class, 'dashboard'])->name('user.dashboard');
});
