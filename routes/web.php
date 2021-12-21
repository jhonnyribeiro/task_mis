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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/', 'middleware' => ['role:administrator']], function () {
    Route::get('dashboard', ['App\Http\Controllers\AdminController', 'dashboard'])->name('admin.dashboard');
});

Route::group(['prefix' => 'user/', 'middleware' => ['role:director|manager|employee']], function () {
    Route::get('dashboard', ['App\Http\Controllers\UserController', 'dashboard'])->name('user.dashboard');
});
