<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', 'AdminController@users')->name('admin.users');
Route::delete('/{user}/userDestroy', 'AdminController@destroyUser')->name('admin.user.destroy');


Route::get('/foodmenu', 'AdminController@foodMenu')->name('admin.foodmenu');
Route::post('/foodmenu', 'AdminController@foodMenuStore')->name('admin.foodmenu.store');
Route::delete('/{foodmenu}/foodDestroy', 'AdminController@foodMenuDestroy')->name('admin.foodmenu.destroy');
Route::get('/{foodmenu}/edit', 'AdminController@foodMenuEdit')->name('admin.foodmenu.edit');
Route::patch('/{foodmenu}/update', 'AdminController@foodMenuUpdate')->name('admin.foodmenu.update');


Route::get('/reservations', 'AdminController@reservations')->name('admin.reservations');
