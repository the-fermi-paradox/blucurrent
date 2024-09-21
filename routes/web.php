<?php
declare(strict_types=1);
use App\Http\Controllers\EmpireController;
use Illuminate\Support\Facades\Route;

Route::get('/{col?}', [EmpireController::class, 'index'])->name('empire.list');
Route::delete('/empire/delete/{id}', [EmpireController::class, 'destroy'])->name('empire.delete');

Route::put('/empire/update/{id}', [EmpireController::class, 'update'])->name('empire.update');
Route::get('/empire/update/{id}', [EmpireController::class, 'edit'])->name('empire.edit');

Route::get('/empire/create/', [EmpireController::class, 'create'])->name('empire.create');
Route::post('/empire/create/', [EmpireController::class, 'store'])->name('empire.store');
