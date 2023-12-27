<?php

use App\Http\Controllers\KegiatanApiController;
use App\Http\Controllers\UserApiController;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tests\Feature\KegiatanApiTest;

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
Route::get('/users/current', [UserApiController::class, 'getCurrentUser']);
Route::put('/users/current/profile', [UserApiController::class, 'updateProfile']);
Route::delete('/users/current/logout', [UserApiController::class, 'logout']);


Route::post('/kegiatan', [KegiatanApiController::class, 'create']);
Route::get('/kegiatan/search', [KegiatanApiController::class, 'search']);
Route::get('/kegiatan/latest', [KegiatanApiController::class, 'latest']);
Route::get('/kegiatan/filterBydate', [KegiatanApiController::class, 'filterBydate']);

Route::put('/kegiatan/{id}', [KegiatanApiController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/kegiatan/{id}', [KegiatanApiController::class, 'remove'])->where('id', '[0-9]+');


});
