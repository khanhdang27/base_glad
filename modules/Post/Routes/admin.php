<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("post")->group(function () {
        Route::get("/", "PostController@index")->name("get.post.list")->middleware('can:post');
        Route::middleware('can:post-create')->group(function () {
            Route::get("/create", "PostController@getCreate")->name("get.post.create");
            Route::post("/create", "PostController@postCreate")->name("post.post.create");
        });
        Route::middleware('can:post-update')->group(function () {
            Route::get("/update/{id}", "PostController@getUpdate")->name("get.post.update");
            Route::post("/update/{id}", "PostController@postUpdate")->name("post.post.update");
        });
        Route::get("/delete/{id}", "PostController@delete")->name("get.post.delete")->middleware('can:post-delete');
    });

    Route::prefix("post-category")->group(function () {
        Route::get("/", "PostCategoryController@index")->name("get.post_category.list")->middleware('can:post-category');
        Route::middleware('can:post-category-create')->group(function () {
            Route::get("/create", "PostCategoryController@getCreate")->name("get.post_category.create");
            Route::post("/create", "PostCategoryController@postCreate")->name("post.post_category.create");
        });
        Route::middleware('can:post-category-update')->group(function () {
            Route::get("/update/{id}", "PostCategoryController@getUpdate")->name("get.post_category.update");
            Route::post("/update/{id}", "PostCategoryController@postUpdate")->name("post.post_category.update");
        });
        Route::get("/delete/{id}", "PostCategoryController@delete")->name("get.post_category.delete")->middleware('can:post-category-delete');
    });
});
