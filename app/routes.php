<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function()
{
	return View::make('content');
});

Route::any('publicalbums', 'AlbumsController@index');
Route::any('publicphotos', 'AlbumsController@publicAlbums');
Route::any('albums/{albums}/photos','PhotosController@index');
//Route::any('publicphotos', 'PhotosController@publicPhotos');

Route::group(["before" => "guest"], function()
{
    Route::any("/login", [
        "as"   => "users/login",
        "uses" => "UsersController@loginAction"
    ]);

});

Route::group(["before" => "auth"], function()
{
    Route::any("/logout", [
        "as"   => "users/logout",
        "uses" => "UsersController@logoutAction"
    ]);

    //Route::get("/create", function()
    //{
    //    return View::make('albums/create');
    //});

    //Route::any("/createAlbum", [
    //    "as"   => "albums/createAlbum",
    //    "uses" => "AlbumsController@createAlbumAction"
    //]);

    Route::post('albums/{albums}/photos/upload', array('as' => 'upload', 'uses' => 'PhotosController@postUpload'));

    Route::resource('albums', 'AlbumsController');
    Route::resource('albums.photos', 'PhotosController');
    Route::resource('photos.comments', 'CommentsController');

    //Route::get('photos/upload', 'PhotosController@postUpload');



});