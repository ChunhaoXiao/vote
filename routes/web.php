<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AssetResourceController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ConfigController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::post('/upload', [UploadController::class, 'store']);

    Route::resource('/asset', AssetResourceController::class);
    Route::resource('/movie', MovieController::class);
    Route::resource('/activity', ActivityController::class);
    Route::get('/config', [ConfigController::class, 'create'])->name('config.create');
    Route::post('/config', [ConfigController::class, 'store'])->name('config.store');
});
