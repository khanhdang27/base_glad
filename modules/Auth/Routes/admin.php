<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("login", "AuthController@login")->name("admin.get.login");
    Route::post("login", "AuthController@login")->name("admin.post.login");
    Route::get("logout", "AuthController@logout")->name("admin.get.logout");
    Route::get("forgot-password", "AuthController@forgotPassword")->name("admin.get.forgot_password");
    Route::post("forgot-password", "AuthController@forgotPassword")->name("admin.get.forgot_password");
});
