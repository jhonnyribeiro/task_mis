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

//Route::group(['prefix' => 'admin/', 'middleware' => ['role:administrator']], function () {
//    Route::get('dashboard', ['App\Http\Controllers\AdminController', 'dashboard'])->name('admin.dashboard');
//});

Route::group(['prefix' => 'user/', 'middleware' => ['role:director|manager|employee']], function () {
    Route::get('dashboard', ['App\Http\Controllers\UserController', 'dashboard'])->name('user.dashboard');
});

Route::group(['prefix' => 'admin/'], function () {
    Route::get('dashboard', ['App\Http\Controllers\AdminController', 'dashboard'])->name('admin.dashboard');
    Route::get('manage/users', ['App\Http\Controllers\AdminController', 'userIndex'])->name('admin.user.index');
    Route::get('manage/users/create', ['App\Http\Controllers\AdminController', 'userCreate'])->name('admin.user.create');
    Route::post('manage/users', ['App\Http\Controllers\AdminController', 'userStore'])->name('admin.user.store');
    Route::get('manage/users/{id}', ['App\Http\Controllers\AdminController', 'userShow'])->name('admin.user.show');
});
