<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Citizen\UserController;
use App\Http\Controllers\Citizen\CitizenController;
use App\Http\Controllers\Citizen\NetworkController;
use App\Http\Controllers\Citizen\ListDetailController;

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
    return view('auth.login');
});
Route::post('crop-image-upload', [UserController::class, 'uploadCropImage']);

Route::middleware(['auth','admin'])->group(function () {
    Route::post('filter-user',[UserController::class,'filterUser']);
    Route::resource('user',UserController::class);
    Route::resource('network',NetworkController::class);
    Route::resource('list',ListDetailController::class);
    Route::resource('citizen',CitizenController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
