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
//The following routes show the controller methods that are called when a certain URL is entered
Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about');
Route::get('/trending', 'PageController@trending');

Route::resource('comic', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload/three','UploadComicController@three');
Route::post('/upload-image', 'ImageUpload@uploadImage');

Route::post('/upload-comic', 'PageTemplateController@uploadPage');
Route::get('/upload-comic', 'PageTemplateController@page');

Route::get('comments', 'FeedbackController@show');
Route::post('comment-submit', 'FeedbackController@UploadComments');

Route::get('reviews', 'FeedbackController@showReview');
Route::post('reviews', 'FeedbackController@reviews');

Route::get('library', 'PageController@library');

Route::post('search', 'PageController@search');

Route::post('favourites', 'FeedbackController@favourites');
Route::post('change', 'UserTypeController@change');
Route::get('change', 'UserTypeController@changed');
Route::get('/profile', 'PageController@profile');
