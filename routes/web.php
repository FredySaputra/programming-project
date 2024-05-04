<?php

use App\Http\Controllers\CalasController;
use App\Http\Controllers\PresensiAsisten;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/anggotas', DashboardController::class);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'home']);

Route::get('/dashboard/Asisten', [PresensiAsisten::class, 'index'])->name('asisten');
Route::post('/dashboard/Asisten', [PresensiAsisten::class, 'store'])->name('simpanmasuk');

Route::get('/dashboard/Calas', [CalasController::class, 'index'])->name('calas');
Route::post('/dashboard/Calas', [CalasController::class, 'store'])->name('simpancalas');

Route::get('/registuser', [DashboardController::class, 'index'])->name('registuser');
Route::post('/registuser', [DashboardController::class, 'store'])->name('postuser');

Route::get('/logasisten', function () {
    return view('dashboard.loginasisten.login-asisten');
});

Route::get('/logcalas', function () {
    return view('dashboard.logincalas.login-calas');
});
Route::post('/logincalas', [LoginController::class, 'OtentikasiCalas'])->name('logincalas');
Route::post('/loginasisten', [LoginController::class, 'OtentikasiAsisten'])->name('loginasisten');

Route::get('/formlogout', [PresensiAsisten::class, 'logout'])->name('formlogout');
Route::post('/presensikeluar', [PresensiAsisten::class, 'presensikeluar'])->name('presensikeluar');

Route::get('/formkeluar', [CalasController::class, 'formlogout'])->name('formkeluar');
Route::post('/logoutcalas', [CalasController::class, 'logout'])->name('logoutcalas');