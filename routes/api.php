<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Registration and Login
Route::post('/add_user', [RegistrationController::class, 'add_user']);

//Books operations 
Route::post('/add_book', [BooksController::class, 'add_book']);
