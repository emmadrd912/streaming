<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/catalog', function () {
    return view('catalog');
});

Route::post('/add-video', 'HomeController@addvideo');
//
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', 'UsersController');
    Route::resource('roles','RoleController');
});
