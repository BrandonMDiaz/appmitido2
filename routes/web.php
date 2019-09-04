<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.index');
});
Route::get('/universidad', function () {
    return view('universidad.index');
});

Route::get('/tutoriales', 'TutorialController@index');

// Route::get('/examen', 'ExamenController@index');
Route::resource('examen', 'ExamenController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
