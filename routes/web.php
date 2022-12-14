<?php

use App\Http\Controllers\chatbotController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\tablesController;
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

    Route::get('/','index')->name('home')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/chatbot', [chatbotController::class,'index'])->name('chatbot');
    Route::post('/user_sent',[chatbotController::class, 'user_sent'])->name('chatbot');
    Route::get('/bot_sent',[chatbotController::class, 'bot_sent'])->name('chatbot');
    Route::get('/clear_log',[chatbotController::class, 'clear_log'])->name('chatbot');
});

Route::controller(tablesController::class)->group(function(){
    Route::get('/tables','index')->name('tables')->middleware('auth');
    Route::get('/add_data','add_data')->name('tables')->middleware('auth');
    Route::get('/edit_data/{id}','edit_data')->name('tables')->middleware('auth');
    Route::get('/destroy_item/{id}','destroy_item')->middleware('auth')->name('item.destroy');
    Route::post('/update_data/{id}','update_data')->name('tables')->middleware('auth');
    Route::post('/store_data','store_data')->name('tables')->middleware('auth');
});

Route::controller(settingsController::class)->group(function(){
    Route::get('/settings','index')->name('settings')->middleware('auth');
    Route::get('/settings/profile','profile')->name('settings')->middleware('auth');
});