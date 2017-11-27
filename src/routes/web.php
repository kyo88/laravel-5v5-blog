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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/add', 'PostController@add')->name('post.add');
Route::post('/post/confirm', 'PostController@confirm')->name('post.confirm');
Route::post('/post/add', 'PostController@postAdd')->name('post.postAdd');
Route::get('/', 'PostController@lists')->name('post.list');
Route::get('/post/detail/{id}', 'PostController@detail')->where('id', '[0-9]+')->name('post.detail');


