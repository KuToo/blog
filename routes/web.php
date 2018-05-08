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
    Route::get('/login', 'LoginController@login');//登录页
    Route::post('/login', 'LoginController@toLogin');//登录逻辑
    Route::get('/logout', 'LoginController@logout');//退出登录
    Route::get('/register', 'LoginController@register');//注册页
    Route::post('/register', 'LoginController@toRegister');//注册逻辑
    Route::get('/', 'PostController@index');//首页
    Route::get('/post/{post}', 'PostController@show');//文章详情页
    Route::get('/postadd', 'PostController@create');//创建文章页
    Route::post('/postadd', 'PostController@store');//创建文章逻辑
    Route::get('/postedit/{post}', 'PostController@edit');//编辑文章页
    Route::post('/postedit/{post}', 'PostController@update');//编辑文章逻辑
    Route::get('/postdel/{post}', 'PostController@delete');//删除文章
    Route::get('/user/setting', 'UserController@setting');//个人设置
    Route::post('/user/setting', 'UserController@settingStore');//个人设置
});
Route::group(['namespace' => 'Admin'], function(){
    Route::get('/admin', 'IndexController@index');
});
