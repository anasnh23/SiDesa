<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


//authenticate
Route::get('/', [AuthController::class,'login']);
Route::post('/login', [AuthController::class,'authenticate']);
Route::post('/logout', [AuthController::class,'logout']);
Route::get('/register', [AuthController::class,'registerview']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

// Routes untuk data penduduk

Route::get('/resident', [ResidentController::class, 'index'])->name('resident.index');
Route::get('/resident/create', [ResidentController::class, 'create']);
Route::post('/resident', [ResidentController::class, 'store'])->name('resident.store');
Route::get('/resident/{id}/edit', [ResidentController::class, 'edit']);
Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.update'); 
Route::delete('/resident/{id}', [ResidentController::class, 'destroy']);

