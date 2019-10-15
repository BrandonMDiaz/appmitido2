<?php

Route::get('/', 'LandingController@index');

Route::get('/perfil','PerfilController@perfil')->name('perfil');
// Route::get('/universidad', function () {
//     return view('universidad.index');
// });
Route::get('/universidad','UniversidadController@index' );
Route::get('/tutoriales', 'TutorialController@index');

Route::get('/vocacion', 'VocacionController@orientador');

// Route::get('/examen', 'ExamenController@index');
Route::resource('categorias', 'CategoriaController');
Route::resource('subcategorias', 'SubCategoriaController');
Route::resource('preguntas', 'PreguntaController');

Route::resource('examen', 'ExamenController');
Route::get('/resultados', 'ExamenController@resultados')->name('resultados.index');
Route::get('/resultados/{examen}', 'ExamenController@resultadosShow')->name('resultados.show');


Auth::routes();

Route::get('universidad-login', 'Auth\UniversidadLoginController@showLoginForm');
Route::post('universidad-login', ['as'=>'universidad-login','uses'=>'Auth\UniversidadLoginController@login']);
Route::post('universidad-logout', ['as'=>'universidad-logout','uses'=>'Auth\UniversidadLoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeU', 'UniversidadController@universidad')->name('homeU');
