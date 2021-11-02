<?php

use App\Http\Middleware\OnlyGroupUserAllowedMiddleware;
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

Route::get('/','HomeController@index');

//hanya untuk role_id 2 saja dibenarkan
Route::middleware(OnlyGroupUserAllowedMiddleware::class)->get('/users','UsersController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('assets',AssetController::class);
//route grouping


