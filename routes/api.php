<?php

use App\Location;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthApiController@login');
Route::post('me', 'AuthApiController@profile')->middleware('jwt:auth');
Route::post('logout', 'AuthApiController@logout');

//route for api/assets
Route::get('/assets', 'AssetApiController@index');
Route::get('/assets/{id}', 'AssetApiController@show');
Route::get('/asset-checker/{serial}', 'AssetCheckerApiController@show');
