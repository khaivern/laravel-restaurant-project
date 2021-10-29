<?php

use Illuminate\Support\Facades\Route;

Route::get('/chefs', 'ChefController@index')->name('admin.chefs.index');
Route::post('/chefs', 'ChefController@store')->name('admin.chef.store');
Route::delete('/chef/{chef}/destroy', 'ChefController@destroy')->name('admin.chef.destroy');
Route::get('/chef/{chef}/edit', 'ChefController@edit')->name('admin.chef.edit');
Route::patch('/chef/{chef}/update', 'ChefController@update')->name('admin.chef.update');
