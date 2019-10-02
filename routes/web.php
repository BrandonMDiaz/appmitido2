<?php

Route::get('/', 'LandingController@index');

Route::get('/perfil','PerfilController@perfil')->name('perfil');
// Route::get('/universidad', function () {
//     return view('universidad.index');
// });
Route::get('/universidad','UniversidadController@index' );
Route::get('/tutoriales', 'TutorialController@index');

// Route::get('/examen', 'ExamenController@index');
Route::resource('examen', 'ExamenController');
Route::resource('categorias', 'CategoriaController');
Route::resource('subcategorias', 'SubCategoriaController');
Route::resource('preguntas', 'PreguntaController');

Auth::routes();

Route::get('universidad-login', 'Auth\UniversidadLoginController@showLoginForm');
Route::post('universidad-login', ['as'=>'universidad-login','uses'=>'Auth\UniversidadLoginController@login']);
Route::post('universidad-logout', ['as'=>'universidad-logout','uses'=>'Auth\UniversidadLoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');
