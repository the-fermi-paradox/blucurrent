<?php

use App\Http\Controllers\EmpireController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmpireController::class, 'index'])->name('empire.list');
Route::post('/update/{id}', [EmpireController::class, 'update'])->name('empire.update');
Route::get('/update/{id}', [EmpireController::class, 'edit'])->name('empire.edit');

