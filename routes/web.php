<?php

use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

