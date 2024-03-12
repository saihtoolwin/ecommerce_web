<?php

// use App\Http\Controllers\Admin\HomeController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // dd($user);
    return redirect()->route('admin.home');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/home','HomeController@index')->name('home');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

    // User
    Route::resource('/user','UserController');
    Route::resource('/rating','RatingController');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
