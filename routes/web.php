<?php

use App\Models\SanPham;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;

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
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister'])->name('register.index');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', function () {
    return view('clients.home');
});


Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admins.dashboard');
    })->name('admin.dashboard');
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('sanphams', SanPhamController::class);
});

