<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ind', function () {

dd("hehee");

});

Route::post('movies/', 'Api\MoviesController@addMovie');
Route::put('movies/', 'Api\MoviesController@editMovie');
Route::get('movies/', 'Api\MoviesController@getMovies');
Route::get('movies/{id}', 'Api\MoviesController@getMovie');
Route::delete('movies/{id}', 'Api\MoviesController@deleteMovie');


// User Reviews
Route::post('review/', 'Api\MoviesController@addUserReview');
Route::get('review/{movie_id}', 'Api\MoviesController@getMovieReviews');
Route::put('review/{movie_id}', 'Api\MoviesController@editMovieReview');
Route::delete('review/{movie_id}', 'Api\MoviesController@deleteMovieReview');

