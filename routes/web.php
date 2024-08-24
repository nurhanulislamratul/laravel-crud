<?php


use App\Http\Controllers\BikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add-new-bike', [BikeController::class, 'bike'])->name('bike');

Route::post('/bike-create', [BikeController::class, 'bikeCreate'])->name('bike-create');

Route::get('/bike-list', [BikeController::class, 'bikeList'])->name('bike-list');

Route::get('/edit-bike/{id}', [BikeController::class, 'updateBike'])->name('edit-bike');
Route::get('/edit-bike-delete/{id}', [BikeController::class, 'editBikeDelete'])->name('editBikeDelete');
