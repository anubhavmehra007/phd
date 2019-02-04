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

Route::get('/', 'PagesController@index');


Route::resource('/guides', 'GuidesController');

Route::resource('/scholars', 'ScholarsController');

Route::resource('/depts', 'DeptsController');

Route::resource('/colleges', 'CollegesController');

