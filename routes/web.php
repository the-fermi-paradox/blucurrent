<?php

use App\Http\Controllers\EmpireController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmpireController::class, 'index']);
