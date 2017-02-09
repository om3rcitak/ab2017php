<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('movie', '\App\Movie');

Route::get('/', ["uses" => "MovieController@index", "as" => "home.index"]);

Route::group(["middleware" => "guest"], function(){

    Route::get("login", ["uses" => "UserController@login", "as" => "user.login"]);
    Route::post("login", ["uses" => "UserController@doLogin", "as" => "user.login"]);

    Route::get("register", ["uses" => "UserController@register", "as" => "user.register"]);
    Route::post("register", ["uses" => "UserController@doRegister", "as" => "user.register"]);

});

Route::group(["middleware" => "auth"], function(){

    Route::get("movie/create", "MovieController@create");
    Route::post("movie", "MovieController@store");

    Route::get("movie/{movie}/delete", "MovieController@delete");

    Route::get("movie/{movie}/edit", "MovieController@edit");
    Route::put("movie/{movie}", "MovieController@update");

    Route::get("logout", ["uses" => "UserController@logout", "as" => "user.logout"]);

});

Route::get("movie/{movie}", "MovieController@show");

Route::group(["prefix" => "api", "namespace" => "Api"], function(){
    Route::get("movies", "MovieController@index");

    Route::get("movie/{movie}", "MovieController@show");
});