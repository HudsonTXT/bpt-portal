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




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resources([
    'admin/pages' => 'Admin\PagesController',
    'admin/users' => 'Admin\UsersController',
]);

Route::get('/page/{url}', 'Admin\PagesController@show');
