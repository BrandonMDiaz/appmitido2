<?php

Route::get('/', 'LandingController@index')->name('landing');

Route::get('/perfil','PerfilController@perfil')->name('perfil');
Route::get('/perfil/editar','PerfilController@show')->name('perfil.show');
Route::patch('/perfil/editar/{user}','PerfilController@editar')->name('perfil.editar');

// Route::get('/universidad', function () {
//     return view('universidad.index');
// });
Route::get('/universidad','UniversidadController@index');
Route::get('/tutoriales', 'TutorialController@index');

Route::get('/vocacion', 'VocacionController@index')->name('vocacion.index');
Route::get('/vocacion/test', 'VocacionController@test')->name('vocacion.test');
Route::post('/vocacion', 'VocacionController@orientador')->name('vocacion.orientador');
Route::get('/vocacion/resultados', 'VocacionController@resuldatos')->name('vocacion.resultados');

// Route::get('/examen', 'ExamenController@index');
Route::resource('categorias', 'CategoriaController');
Route::resource('subcategorias', 'SubCategoriaController');
Route::resource('preguntas', 'PreguntaController');

Route::resource('examen', 'ExamenController');
Route::get('/resultados', 'ExamenController@resultados')->name('resultados.index');
Route::get('/resultados/{examen}', 'ExamenController@resultadosShow')->name('resultados.show');


/*Autenticacion*/
Auth::routes();
Route::get('universidad-login', 'Auth\UniversidadLoginController@showLoginForm');
Route::get('universidad-register', 'Auth\UniversidadRegisterController@showRegisterForm')->name('registerU');
Route::post('universidad-register', ['as'=>'registrarU','uses'=>'Auth\UniversidadRegisterController@register']);

Route::post('universidad-login', ['as'=>'universidad-login','uses'=>'Auth\UniversidadLoginController@login']);
Route::post('universidad-logout', ['as'=>'universidad-logout','uses'=>'Auth\UniversidadLoginController@logout']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeU', 'UniversidadController@universidad')->name('homeU');
