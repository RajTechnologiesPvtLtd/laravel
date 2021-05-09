<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [App\Http\Controllers\Admin\UserController::class, 'sendNotification']);
Auth::routes();

Route::group(['middleware' => ['auth'],'prefix'=>'admin','as'=>'admin.'], function() {
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
