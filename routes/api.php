<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::get('user', 'UserController@user')->middleware('auth:api');
 Route::get('getUserList', 'UserController@getUserList')->middleware('auth:api');
 Route::post('addUser', 'UserController@addUser')->middleware('auth:api');
 Route::put('updateUser/{id}', 'UserController@updateUser')->middleware('auth:api');
 Route::delete('deleteUser/{id}', 'UserController@deleteUser')->middleware('auth:api');
