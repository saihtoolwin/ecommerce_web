<?php

use App\Http\Controllers\Admin\HomeController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.home');
});


Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function(){
    // Route::get('/home','HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // User
    Route::resource('/user','UserController');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
