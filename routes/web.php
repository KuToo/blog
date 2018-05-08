<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Home'], function(){
    Route::get('/', 'PostController@index');//首页
    Route::get('/login', 'UserController@login');//登录页
    Route::post('/login', 'UserController@tologin');//登录逻辑
    Route::get('/logout', 'UserController@logout');//退出登录
    Route::get('/register', 'UserController@register');//注册页
    Route::post('/register', 'UserController@toregister');//注册逻辑
    Route::get('/post/{post}', 'PostController@show');//文章详情页
    Route::get('/postadd', 'PostController@create');//创建文章页
    Route::post('/postadd', 'PostController@store');//创建文章逻辑
    Route::get('/postedit/{post}', 'PostController@edit');//编辑文章页
    Route::post('/postedit/{post}', 'PostController@update');//编辑文章逻辑
    Route::get('/postdel/{post}', 'PostController@delete');//删除文章
});
Route::group(['namespace' => 'Admin'], function(){
    Route::get('/admin', 'IndexController@index');
});
