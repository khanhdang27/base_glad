<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->prefix("admin")->group(function () {
    Route::prefix("permission")->group(function () {
        Route::get("/", "PermissionController@index")->name("get.permission.list");
        Route::post('/', 'PermissionController@postUpdate')->name('post.permission.update');
    });
});
