<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProjectController;

Route::get("/", [ProjectController::class, "index"])->name("index");
Route::delete('/comics/{id}', [ProjectController::class, 'destroy'])
    ->name('pages.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/users/{id}', [ProjectController::class, 'show'])
    ->name('users.show');
require __DIR__ . '/auth.php';