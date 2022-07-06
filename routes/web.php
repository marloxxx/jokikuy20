<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Office\OrderController;
use App\Http\Controllers\Office\RecapController;
use App\Http\Controllers\Office\DashboardController;
use App\Http\Controllers\Office\ProjectController;
use App\Http\Controllers\Office\SkillController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('home',HomeController::class);

Route::get('office',[AuthController::class, 'index'])->name('office.index');
Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
        Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('dashboard',DashboardController::class);
        Route::resource('orders',OrderController::class);
        Route::resource('recap',RecapController::class);
        Route::post('recap/{recap}/selesai', [RecapController::class, 'selesai'])->name('recap.selesai');
        Route::resource('project',ProjectController::class);
        Route::resource('skill',SkillController::class);
        
    });