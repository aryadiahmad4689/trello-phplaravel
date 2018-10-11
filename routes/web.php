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
Route::group(['namespace' => 'Trello'], function (){

Route::get('/show-board','BoardController@index')->name('show-board');
Route::get('/detail-board/{id}','BoardController@showDetail')->name('show-board-detail'); 
Route::post('/create','BoardController@store')->name('create-board');

Route::post('/create-post/{id}','PostController@store')->name('create-post');
Route::delete('/delete-post/{id}','PostController@destroy')->name('delete-post'); 

Route::post('/create-card/{id}','CardController@store')->name('create-card');
Route::delete('/delete-card/{id}','CardController@destroy')->name('delete-card'); 
Route::delete('/delete-card/{id}','CardController@destroy')->name('delete-card'); 
Route::get('/edit-card/{id}','CardController@edit')->name('edit-card'); 
Route::put('/edit-card/{id}','CardController@update')->name('update.card'); 
Route::get('/edit-card-move/{idpost}/{idcard}','CardController@move')->name('move.card'); 












});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


