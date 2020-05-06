<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::resource('/todo','TodoController');

Route::delete('/todos/{todo}/incomplete','TodoController@incomplete')->name('todo.incomplete');
Route::put('/todos/{todo}/complete','TodoController@complete')->name('todo.complete');



Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload','UserController@uploadAvatar');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
