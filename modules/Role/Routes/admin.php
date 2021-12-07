<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("role")->group(function () {
        Route::get("/", "RoleController@index")->name("get.role.list");
        Route::get("create", "RoleController@getCreate")->name("get.role.create");
        Route::post("create", "RoleController@postCreate")->name("post.role.create");
        Route::get("update/{id}", "RoleController@getUpdate")->name("get.role.update");
        Route::post("update/{id}", "RoleController@postUpdate")->name("post.role.update");
        Route::get("delete/{id}", "RoleController@delete")->name("get.role.delete");
    });
});
