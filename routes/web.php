<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/statistics', 'App\Http\Controllers\TaskController@statistics');
Route::get('/', 'App\Http\Controllers\TaskController@index');
Route::get('/create', 'App\Http\Controllers\TaskController@create');
Route::post('/store', 'App\Http\Controllers\TaskController@store');
