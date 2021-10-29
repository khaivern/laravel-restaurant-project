<?php

use Illuminate\Support\Facades\Route;

Route::post('/reservation/store', 'HomeController@reservationStore')->name('user.reservation.store');
Route::post('/foodmenu/{foodmenu}/store', 'HomeController@foodMenuStore')->name('user.foodmenu.store');
Route::get('/cart/view', 'HomeController@cart')->name('user.cart.view');
Route::delete('/cart/{cart}/destroy', 'HomeController@cartDestroy')->name('user.cart.destroy');
