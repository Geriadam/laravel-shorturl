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

Route::get('/index', function () {
    return view('index');
});

Route::post('url/urlcreate', 'urlController@processcreate'); 
Route::get('url/index', 'urlController@index');
Route::get('url/create', 'urlController@create');
Route::get("url/{hash}", 'urlController@link');
Route::get("url/delete/{id}", 'urlController@delete');