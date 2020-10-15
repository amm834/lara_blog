<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

/* Home Route */

Route::get('/', 'HomeController@index')->name('home');

/* Logout Route */

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['namespace' => 'admin'], function () {
  Route::get('post/{id}/show', 'PostController@show');
  Route::post('post/{id}/show', 'CommentController@store');
});

/* Admin Route */

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'admin'], function () {

  /* Show All Users */

  Route::get('/users', 'AdminController@show')->name('all-users');

  /* User Delete */

  Route::get('users/{id}/delete', 'AdminController@delete');

  /* Category */

  Route::get('/categories', 'CategoryController@index')->name('all-categories');
  Route::post('/categories', 'CategoryController@store');

  /* Categories */

  Route::get('category/{id}/update', 'CategoryController@edit');
  Route::post('category/{id}/update', 'CategoryController@update');

  /* Posts */

  // @create

  Route::get('post/create', 'PostController@create')->name('post-create');
  Route::post('post/create', 'PostController@store');

  // @delete

  Route::get('posts', 'AdminController@index')->name('manage-posts');
  Route::get('post/{id}/delete', 'PostController@delete');

  //@edit || @update

  Route::get('post/{id}/edit', 'PostController@edit');
  Route::post('post/{id}/edit', 'PostController@update');


});