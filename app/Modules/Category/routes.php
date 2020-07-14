<?php

$module_namespace = "App\Modules\Category\Controllers";

Route::prefix('/categories')->namespace($module_namespace)->group(function () {
    Route::get('/index', "CategoryController@index")->name('categories.index');
});

Route::group(['middleware' => 'auth'], function () use ($module_namespace) {

});
