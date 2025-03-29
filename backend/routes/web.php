<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('signin', [AuthController::class, 'signin'])->name('signin');
Route::post('signin', [AuthController::class, 'signin']);

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('dashboard');
});

Route::get('/dashboard/novo-agendamento', [DashboardController::class, 'novo_agendamento'])->name('novo_agendamento');

Route::post('/dashboard/novo-agendamento', [DashboardController::class, 'novo_agendamento'])->name('dashboard/novo-agendamento');
