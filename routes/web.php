<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntryController;
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


// FRONT
Route::get('home-page', [FrontController::class, 'home'])->name('home');
Route::get('/category/{category}',[FrontController::class,'goToCategory'])->name('goToCategory');
//ENTRY
Route::get('new', [EntryController::class, 'showEntry'])->name('newEntry');
Route::get('my-entry/delete/{id}',[EntryController::class,'deleteMyEntry'])->name('deleteMyEntry');
Route::post('new/add-entry/', [EntryController::class, 'addEntry'])->name('addEntry');
Route::get('show/entry/{id}', [EntryController::class, 'goToEntry'])->name('goToEntry');
Route::post('new/sub-entry/{id}',[EntryController::class,'newSubEntry'])->name('newSub');
Route::get('delete/sub-entry/{id}',[EntryController::class,'deleteMySubEntry'])->name('deleteMySubEntry');
// AUTH
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('signin',[AuthController::class,'signUp'])->name('signUp');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
//PROFILE
Route::get('/profile',[ProfileController::class,'showProfile'])->name('showProfile');
Route::post('/profile-update',[ProfileController::class,'update'])->name('updateProfile');
Route::post('/password-update',[ProfileController::class,'passUpdate'])->name('passUpdate');

// Admin Panel
Route::middleware(['isAdmin'])->group(function(){
    //User
    Route::get('/admin-panel/home-page',[AdminController::class,'homePage'])->name('adminHomePage');
    Route::get('/admin-panel/users',[AdminController::class,'displayUsers'])->name('displayUsers');
    Route::get('/admin-panel/user-delete/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');
    Route::get('/admin-panel/user-entries/{id}',[AdminController::class,'userEntries'])->name('userEntries');
    //Admin 
    Route::get('/admin-panel/admins',[AdminController::class,'displayAdmins'])->name('displayAdmins');
    Route::get('/admin-panel/new-admin',[AdminController::class,'newAdmin'])->name('newAdmin');
    Route::post('/admin-panel/add-new-admin',[AdminController::class,'addNewAdmin'])->name('addNewAdmin');
    // Category
    Route::get('/admin-panel/categories',[AdminController::class,'showCategories'])->name('showCategories');
    Route::get('/admin-panel/new-category',[AdminController::class,'newCategory'])->name('newCategory');
    Route::post('/admin-panel/add-new-category',[AdminController::class,'addNewCategory'])->name('addNewCategory');
    Route::get('/admin-panel/edit-category/{id}',[AdminController::class,'editCategory'])->name('editCategory');
    Route::put('/admin-panel/update-category/{id}',[AdminController::class,'updateCategory'])->name('updateCategory');
    Route::get('/admin-panel/delete-category/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');
    //ENTRY
    Route::get('/admin-panel/entries',[AdminController::class,'showEntries'])->name('showEntries');
    Route::get('/admin-panel/delete-entry/{id}',[AdminController::class,'deleteEntry'])->name('deleteEntry');
    // Route::get('/admin-panel/delete-entry/{id}',[AdminController::class,'deleteEntry'])->name('deleteEntry');
    Route::get('/admin-panel/delete-subentry/{id}',[AdminController::class,'deleteSubEntry'])->name('deleteSubEntry');
    Route::get('/admin-panel/entry-subentry/{id}',[AdminController::class,'goToSubEntry'])->name('goToSubEntry');
});











