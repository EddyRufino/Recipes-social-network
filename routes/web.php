<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('recipes', 'RecipeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
