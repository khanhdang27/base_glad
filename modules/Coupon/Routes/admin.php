<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("coupon")->group(function () {
        Route::get("/", "CouponController@index")->name("get.coupon.list");
        Route::get("create", "CouponController@getCreate")->name("get.coupon.create");
        Route::post("create", "CouponController@postCreate")->name("post.coupon.create");
        Route::get("update/{id}", "CouponController@getUpdate")->name("get.coupon.update");
        Route::post("update/{id}", "CouponController@postUpdate")->name("post.coupon.update");
        Route::get("delete/{id}", "CouponController@delete")->name("get.coupon.delete");
    });
});
