<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// softwares
Route::get('/getsoftwares', 'backend\SoftwareController@getSoftwares');
Route::match(['put', 'patch'],'/updatesoftware/{sof_id}/{name}/{description}', 'backend\SoftwareController@updateSoftware');
Route::delete('/deletesoftware/{sof_id}', 'backend\SoftwareController@deleteSoftware');
Route::match(['put', 'patch'],'/status-software/{sof_id}', 'backend\SoftwareController@statusSoftware');