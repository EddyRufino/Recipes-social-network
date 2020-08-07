<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('recipes', 'RecipeController');
Route::resource('perfils', 'PerfilController')->except(['index', 'create', 'store']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

