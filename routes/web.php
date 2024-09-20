<?php

use App\Http\Controllers\EmpireController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmpireController::class, 'index'])->name('empire.list');
Route::get('/update/{id}', [EmpireController::class, 'edit'])->name('empire.update');

