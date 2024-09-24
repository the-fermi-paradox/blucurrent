<?php
declare(strict_types=1);
use App\Http\Controllers\EmpireController;
use Illuminate\Support\Facades\Route;

Route::controller(EmpireController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/empire/', 'index')->name('empire.list');
    Route::get('/empire/sort/{col?}/{order?}', 'index')->name('empire.sort');

    Route::get('/empire/create/', 'create')->name('empire.create');
    Route::post('/empire/create/', 'store')->name('empire.store');
    Route::delete('/empire/delete/{id}', 'destroy')->name('empire.delete');

    Route::put('/empire/update/{id}', 'update')->name('empire.update');
    Route::get('/empire/update/{id}', 'edit')->name('empire.edit');
});

Route::get('phpmyinfo', function () {
    phpinfo();
})->name('phpmyinfo');
