<?php
use Illuminate\Support\Facades\Route;

Route::prefix("order")->group(function (){
    Route::get("/", "OrderController@index")->name("get.order.list");
    Route::get("detail/{id}", "OrderController@getDetail")->name("get.order.detail");
});
