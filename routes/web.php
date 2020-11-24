<?php

use Illuminate\Support\Facades\{Auth, Route};

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
});


Route::resource('categories','CategoriesController');
Route::resource('posts','PostController');
Route::get('trashed-posts','PostController@trashed')->name('trashed-posts.index');


//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/categories','CategoriesController@index')->name('categories.index');
//
//Route::put('/categories/start','CategoriesController@create')->name('categories.start');
//
//Route::put('/categories/store','CategoriesController@store')->name('categories.store');
//
//Route::get('/categories/{category}/edit','CategoriesController@edit')->name('categories.edit');
//
//Route::get('/categories/{category}','CategoriesController@update')->name('categories.update');
//
//Route::get('/categories/{category}','CategoriesController@delete')->name('categories.delete');
//
//
//
////PostController
//
//Route::resource('posts','PostController');
//
//
//

