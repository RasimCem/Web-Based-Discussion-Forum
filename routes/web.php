<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

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


Route::get('/profile', function () {
    return view('profile');
});
 Route::get('/category', function () {
    return view('category');
});

Route::get('/entry', function () {
    return view('entry');
});
// FRONT ENTRY
Route::get('home-page', [FrontController::class, 'home'])->name('home');
Route::get('new', [FrontController::class, 'showEntry'])->name('newEntry');
Route::post('new/add-entry/', [FrontController::class, 'addEntry'])->name('addEntry');
// AUTH
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('signin',[AuthController::class,'signUp'])->name('signUp');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
//PROFILE
Route::get('/profile',[ProfileController::class,'showProfile'])->name('showProfile');
Route::post('/profile-update',[ProfileController::class,'update'])->name('updateProfile');
Route::post('/password-update',[ProfileController::class,'passUpdate'])->name('passUpdate');