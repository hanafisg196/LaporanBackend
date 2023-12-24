<?php

use App\Http\Controllers\UserApiController;
use App\Http\Middleware\ApiAuthMiddleware;
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
Route::post('/users', [UserApiController::class, 'register']);
Route::post('/users/login', [UserApiController::class, 'login']);

Route::middleware(ApiAuthMiddleware::class)->group(function (){
Route::get('/users/current', [UserApiController::class, 'get']);
Route::put('/users/current/', [UserApiController::class, 'update']);
});
