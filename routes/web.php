<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProjectController;

Route::get("/", [ProjectController::class, "index"])->name("index");

Route::put('/', [ProjectController::class, 'store'])
    ->name('index');
Route::get('/create', [ProjectController::class, 'create'])
    ->name('pages.create');
Route::delete('/{id}', [ProjectController::class, 'destroy'])
    ->name('pages.destroy');


Route::get('/show/{id}', [ProjectController::class, 'show'])
    ->name('pages.show');




Route::get('/pages/edit/{id}', [ProjectController::class, 'edit'])
    ->name('pages.edit');

    Route::put('/pages/update/{id}', [ProjectController::class, 'update'])
    ->name('pages.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';