<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController@index')->name('inicio.index');

Route::resource('recipes', 'RecipeController');
Route::resource('perfils', 'PerfilController')->except(['index', 'create', 'store']);
Route::post('recipes/{recipe}', 'LikeController@update')->name('likes.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

