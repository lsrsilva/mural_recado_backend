<?php

use App\Http\Controllers\Mural\MuralController;
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

Route::get('mural', 'App\Http\Controllers\Mural\MuralController@index');
Route::post('mural', 'App\Http\Controllers\Mural\MuralController@store');
Route::put('mural/{id}', 'App\Http\Controllers\Mural\MuralController@update');
Route::delete('mural/{id}', 'App\Http\Controllers\Mural\MuralController@delete');
