<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('user', 'UserController@index');
    Route::group(['middleware' => ['checkrole']], function () {
        Route::post('user/store', 'UserController@store');
        Route::post('user/delete/{id}', 'UserController@delete');
        Route::get('user/edit/{id}', 'UserController@edit');
        Route::post('user/update/{id}', 'UserController@update');
    });
});
