<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::prefix('user')->group(function (){
        Route::get('/', "UserController@index")->name('get.user.list')->middleware('can:user');
        Route::middleware('can:user-create')->group(function (){
            Route::get('create', "UserController@getCreate")->name('get.user.create');
            Route::post('create', "UserController@postCreate")->name('post.user.create');
        });
        Route::middleware('can:user-update')->group(function () {
            Route::get('update/{id}', "UserController@getUpdate")->name('get.user.update');
            Route::post('update/{id}', "UserController@postUpdate")->name('post.user.update');
        });
        Route::get('delete/{id}', "UserController@delete")->name('get.user.delete')->middleware('can:user-delete');
    });
});
