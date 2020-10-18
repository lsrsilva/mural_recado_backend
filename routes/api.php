<?php

use App\Http\Controllers\Message\MessageController;
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

Route::get('messages', 'App\Http\Controllers\Message\MessageController@index');
Route::post('messages', 'App\Http\Controllers\Message\MessageController@store');
Route::put('messages/{id}', 'App\Http\Controllers\Message\MessageController@update');
Route::delete('messages/{id}', 'App\Http\Controllers\Message\MessageController@delete');
