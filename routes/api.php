<?php

use App\Http\Controllers\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/faculty', [FacultyController::class, 'ajaxIndex']);
Route::post('/faculty', [FacultyController::class, 'ajaxStore']);