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
    return view('welcome');
});

Route::group(['middleware' => ['web']], function() {
  Route::resource('mahasiswa','MahasiswaController');
  Route::POST('addMahasiswa','MahasiswaController@addMahasiswa');
  Route::POST('editMahasiswa','MahasiswaController@editMahasiswa');
  Route::POST('deleteMahasiswa','MahasiswaController@deleteMahasiswa');
});