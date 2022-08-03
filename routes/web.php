<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::post('filter', [HomeController::class, 'filter'])->name('home.filter');

Route::prefix('films')->group(function () {
    Route::get('/', [FilmsController::class, 'index'])->name('films.index');

    Route::prefix('films-type')->group(function () {
        Route::get('/', [FilmsController::class, 'films_type_list'])->name('films.films_type.films_type_list');
        Route::post('create', [FilmsController::class, 'films_type_create'])->name('films.films_type.films_type_create');
        Route::patch('edit/{film_type}', [FilmsController::class, 'films_type_edit'])->name('films.films_type.films_type_edit');
        Route::delete('delete/{id}', [FilmsController::class, 'films_type_delete'])->name('films.films_type.films_type_delete');
    });

    Route::prefix('films-genders')->group(function () {
        Route::get('/', [FilmsController::class, 'films_genders_list'])->name('films.films_genders.films_genders_list');
        Route::post('create', [FilmsController::class, 'films_type_create'])->name('films.films_genders.films_genders_create');
        Route::patch('edit/{film_type}', [FilmsController::class, 'films_type_edit'])->name('films.films_genders.films_genders_edit');
        Route::delete('delete/{id}', [FilmsController::class, 'films_genders_delete'])->name('films.films_genders.films_genders_delete');
    });
});

Route::prefix('rental')->group(function () {
    Route::get('/', [RentalsController::class, 'index'])->name('rental.rental_list');
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
    Route::post('import', [ClientsController::class, 'import'])->name('clients.import');
});