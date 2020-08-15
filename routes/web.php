<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController@index')->name('inicio.index');

Route::resource('recipes', 'RecipeController');

// Ten en cuenta que lo que mandas dentro de name/{name} tiene que ser igual(nombre) al que envias (En este caso desde show)
Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');
Route::resource('perfils', 'PerfilController')->except(['index', 'create', 'store']);
Route::post('recipes/{recipe}', 'LikeController@update')->name('likes.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

