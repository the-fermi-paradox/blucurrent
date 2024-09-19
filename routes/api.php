<?php
declare(strict_types=1);

use App\Models\Empire;
use App\Models\Release;
use Illuminate\Support\Facades\Route;

Route::get('/releases', function () {
    return Release::all();
});

Route::get('/empires', function () {
    return Empire::all();
});
