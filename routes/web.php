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


//route for the homepage
Route::get('/', 'SessionsController@index');

//route the CSV section
Route::group(['prefix' => 'csv'], function() {
  	Route::get('/', 'CsvController@index');
  	Route::post('/import', 'CsvController@create');
  	Route::post('/import_csv', 'CsvController@parseImport')->name('import_csv');
});

//route the form section
Route::group(['prefix' => 'form'], function() {
  	Route::get('/', 'FormController@index');
  	Route::post('/submit', 'FormController@create');
});