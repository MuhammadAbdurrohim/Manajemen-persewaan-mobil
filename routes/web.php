<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarReturnController;
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
// Registrasi Pengguna
Route::get('/', [UserController::class, 'showRegistrationForm'])->name('welcome');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Manajemen Mobil
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');
// tambahkan rute lainnya sesuai kebutuhan

// Peminjaman Mobil
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
// tambahkan rute lainnya sesuai kebutuhan
Route::get('/returns', [CarReturnController::class, 'index'])->name('returns.index');
Route::post('/returns/store', [CarReturnController::class, 'store'])->name('returns.store');



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// Route::get('/', function () {
//     return view('register');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
