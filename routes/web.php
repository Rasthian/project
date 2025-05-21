<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// localhost:8000/faculty

Route::prefix('/faculty')->group(function () {
    Route::get('/', [FacultyController::class, 'index'])->name('index');
    Route::get('/updateView/{id}', [FacultyController::class, 'updateView'])->name('updateView');
    Route::post('/', [FacultyController::class, 'store'])->name('tambahFakultas');
    Route::put('/{id}', [FacultyController::class, 'update'])->name('editFakultas');
    Route::delete('/{id}', [FacultyController::class, 'destroy']);
});
