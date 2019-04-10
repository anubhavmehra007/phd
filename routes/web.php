<?php

use App\Http\Controllers\ThesisController;

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

Route::get('/', 'PagesController@index');
Route::resource('/email', 'EmailsController');
Route::get('/thesis/create/{id}', 'ThesisController@create')->name('thesis.createthesis');
Route::resource('/thesis', 'ThesisController');
Route::get('/thesis/approve/{id}', 'ThesisController@approve')->name('thesis.approve');
Route::post('/thesis/reject', 'ThesisController@reject');
Route::get('/thesis/reject/{id}', 'ThesisController@rejectForm')->name('thesis.reject');



Route::resource('/guides', 'GuidesController');

Route::resource('/scholars', 'ScholarsController');

Route::resource('/subjects', 'DeptsController');

Route::resource('/colleges', 'CollegesController');


Route::resource('/designations', 'DesigController');

Route::post('/scholars/findguide', 'ScholarsController@ajaxRequest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
