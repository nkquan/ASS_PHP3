<?php

use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Client\OrderController;
use App\Models\SanPham;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Client\AccountController;

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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('product', [HomeController::class,'sanPhamAll'])->name('home.product');
Route::get('product/{id}', [HomeController::class,'sanPhamDetail'])->name('home.detail');
Route::get('product/category/{id}', [HomeController::class,'sanPhamDanhMuc'])->name('home.category');
Route::post('product/comment/{id}', [HomeController::class,'postComment'])->name('home.comment');
Route::delete('product/comment/{id}', [HomeController::class,'deleteBinhLuan'])->name('home.deleteBL');

Route::get('account', [AccountController::class, 'showAccount'])->name('home.account');
Route::put('account/{id}', [AccountController::class, 'editAccount'])->name('home.editAccount');
Route::put('account/password/{id}', [AccountController::class, 'editAccountPwd'])->name('home.editAccountPwd');
Route::get('/list-cart', [CartController::class,'listCart'])->name('cart.list');
Route::post('/add-to-cart', [CartController::class,'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class,'updateCart'])->name('cart.update');

Route::get('login', [AuthController::class, 'showLogin'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister'])->name('register.index');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admins.dashboard');
    })->name('admin.dashboard');
    Route::resource('danhmucs', DanhMucController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('sanphams', SanPhamController::class);
    Route::resource('chucvus', ChucVuController::class);
    Route::resource('taikhoans', TaiKhoanController::class);
    Route::resource('quanlydonhangs', DonHangController::class);
});


Route::middleware(['auth'])->prefix('donhangs')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('donhangs.index');
    Route::get('/create', [OrderController::class, 'create'])->name('donhangs.create');
    Route::post('/store', [OrderController::class, 'store'])->name('donhangs.store');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('donhangs.show');
    Route::post('{id}/update', [OrderController::class, 'update'])->name('donhangs.update');
});


