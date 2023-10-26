<?php

use App\Http\Controllers\Auth\LoginController;
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
// Route::get('/login', [LoginController::class, 'auth.login'])->name('login');
// Route::post('/login', [LoginController::class, 'auth.login']);
// Route::post('/logout', [LoginController::class])->name('logout');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [MenuController::class, 'store'])->name('menu.destroy');
// Route::middleware(['menu.permission'])->group(function () {
// });
