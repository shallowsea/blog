<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('admin/login');
});

Route::get('test', ['uses' => 'TestController@test', 'as' => 'cjh']);

Route::get('admin/crypt', 'Admin\LoginController@crypt');

Route::group(['middleware' => ['web']], function (){
    Route::any('admin/code', 'Admin\LoginController@code');
    Route::any('admin/login', 'Admin\LoginController@login');
});
Route::any('admin/cco', 'Admin\CommenController@sqll');



Route::group(['middleware' => ['web', 'admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('add', 'IndexController@add');
    Route::get('list', 'IndexController@get_list');
    Route::get('tab', 'IndexController@tab');
    Route::get('img', 'IndexController@img');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');
    Route::post('cate/changeorder', 'CategoryController@changeOrder');

    Route::resource('category', 'CategoryController');
});