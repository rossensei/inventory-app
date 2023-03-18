<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OfficeController;

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
Route::get('/', [SiteController::class, 'home']);
Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/logout', [SiteController::class, 'logout']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/edit/{user}', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);

    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/create', [ItemController::class, 'create']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::get('/items/edit/{item}', [ItemController::class, 'edit']);
    Route::put('/items/{item}', [ItemController::class, 'update']);
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    // Route::delete('/items/{item}', [ItemController::class, 'destroy']);

    Route::get('/offices', [OfficeController::class, 'index']);
    Route::get('/offices/create', [OfficeController::class, 'create']);
    Route::post('/offices', [OfficeController::class, 'store']);
    Route::get('/offices/edit/{office}', [OfficeController::class, 'edit']);
    Route::put('/offices/{office}', [OfficeController::class, 'update']);
});
