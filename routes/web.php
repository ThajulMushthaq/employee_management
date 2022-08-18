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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'App\Http\Controllers\LoginController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\LoginController@validate_login');

});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'App\Http\Controllers\DashboardController@home');


    Route::get('/employee', 'App\Http\Controllers\EmployeeController@index');
    Route::get('/employee/add/{id?}', 'App\Http\Controllers\EmployeeController@create');
    Route::post('/employee/save', 'App\Http\Controllers\EmployeeController@store');
    Route::get('/employee/delete/{id?}', 'App\Http\Controllers\EmployeeController@destroy');


    Route::get('/logout', 'App\Http\Controllers\LoginController@do_logout');
});
