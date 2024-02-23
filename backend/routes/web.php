<?php

use App\Http\Controllers\Admin\HomeController;

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
    return redirect()->route('admin.home');
});


Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function(){
    // Route::get('/home','HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
