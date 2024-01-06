<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanWebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[HomeController::class,'Home']);
Route::get('/login', [AdminController::class, 'Login']);
Route::post('/login', [AdminController::class, 'doLogin']);


Route::middleware(AdminMiddleware::class)->group(function (){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //Route::get('/dashboard/listkegiatan', [DashboardController::class, 'getData']);
    Route::post('/logout', [AdminController::class, 'Logout']);
    Route::resource('/kegiatan', KegiatanWebController::class);
    Route::resource('/user', UserWebController::class);
});





