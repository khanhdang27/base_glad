<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("tag")->group(function () {
        Route::get("/", "TagController@index")->name("get.tag.list");
        Route::get("delete/{id}", "TagController@delete")->name("get.tag.delete");
    });
});
