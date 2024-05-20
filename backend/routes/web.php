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

    // Rating
    Route::resource('/rating','RatingController');

    // Category
    Route::resource('/category','CategoryController');

    // Product
    Route::resource('/product','ProductController');

    Route::post('/category/media', 'CategoryController@storeMedia')->name('category.storeMedia');

    // media
    Route::post('posts/media','PostController@storeMedia')->name('posts.storeMedia');

});

// Route::post('image/upload/store', [MultiImageUploadController::class, 'fileStore']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
