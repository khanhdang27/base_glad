<?php
use Illuminate\Support\Facades\Route;

Route::prefix("page")->group(function (){
    Route::get("/", "PageController@index")->name("get.page.list")->middleware('can:page');
    Route::group(['middleware' => 'can:page-create'], function () {
        Route::get('/create', 'PageController@getCreate')->name('get.page.create');
        Route::post('/create', 'PageController@postCreate')->name('post.page.create');
    });
    Route::group(['middleware' => 'can:page-update'], function () {
        Route::get('/update/{id}', 'PageController@getUpdate')->name('get.page.update');
        Route::post('/update/{id}', 'PageController@postUpdate')->name('post.page.update');
    });
    Route::get('/delete/{id}', 'PageController@delete')->name('get.page.delete')->middleware('can:page-delete');
});
