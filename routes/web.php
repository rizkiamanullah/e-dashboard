<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
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
Route::controller(homeController::class)->group(function(){
    Route::get('login','login')->name('login');
    Route::get('create_account','signup')->name('signup');
    Route::get('logout','logout')->name('logout');
    Route::post('post_login','post_login')->name('post_login');
    Route::post('post_signup','post_signup')->name('post_signup');

    Route::get('/','index')->name('home');
});