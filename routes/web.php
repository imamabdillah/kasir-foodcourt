<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});


Route::get('/menu', 'MenuController@index')->name('menu.index');
Route::get('/menu/create', 'MenuController@create')->name('menu.create');
Route::post('/menu', 'MenuController@store')->name('menu.store');
