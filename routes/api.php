<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Api\CalenderController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\APi\ProfessorController;


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

// Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/auth/login', 'login');
});

// Public routes of product
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/{id}', 'show');
    Route::get('/products/search/{name}', 'search');
});

// Protected routes of product and logout
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);
});


Route::controller(EventController::class)->group(function () {
    Route::get('/events/{team_id}', 'show');
    Route::get('/events/search/{team_id}/{search?}', 'search');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/students/{team_id}/{phone_number}', 'getByTeamIdAndPhone');
});

Route::controller(CalenderController::class)->group(function () {
    Route::get('/calender/{team_id}/{class_id}', 'getCalenderByTeamIdAndClass');
});

Route::controller(HorarioController::class)->group(function () {
    Route::get('/horarios/{team_id}/{class_id}', 'show');
});

Route::controller(ProfessorController::class)->group(function () {
    Route::get('/professor/{team_id}/{responsible_professor_id}', 'show');
});