<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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



Route::get('/', 'HomeController@index')->name('home');

Route::get('/redirects', 'HomeController@redirects')->name('redirects');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin/users', 'AdminController@users')->name('admin.users');
Route::delete('/admin/{user}/userDestroy', 'AdminController@destroyUser')->name('admin.user.destroy');


Route::get('/admin/foodmenu', 'AdminController@foodMenu')->name('admin.foodmenu');
Route::post('/admin/foodmenu', 'AdminController@foodMenuStore')->name('admin.foodmenu.store');
Route::delete('/admin/{foodmenu}/foodDestroy', 'AdminController@foodMenuDestroy')->name('admin.foodmenu.destroy');
Route::get('/admin/{foodmenu}/edit', 'AdminController@foodMenuEdit')->name('admin.foodmenu.edit');
Route::patch('/admin/{foodmenu}/update', 'AdminController@foodMenuUpdate')->name('admin.foodmenu.update');


Route::get('/admin/reservations', 'AdminController@reservations')->name('admin.reservations');

Route::get('/admin/chefs', 'ChefController@index')->name('admin.chefs.index');
Route::post('/admin/chefs', 'ChefController@store')->name('admin.chef.store');
Route::delete('/admin/chef/{chef}/destroy', 'ChefController@destroy')->name('admin.chef.destroy');
Route::get('/admin/chef/{chef}/edit', 'ChefController@edit')->name('admin.chef.edit');
Route::patch('/admin/chef/{chef}/update', 'ChefController@update')->name('admin.chef.update');


Route::post('/user/reservation/store', 'HomeController@reservationStore')->name('user.reservation.store');
Route::post('/user/foodmenu/{foodmenu}/store', 'HomeController@foodMenuStore')->name('user.foodmenu.store');
Route::get('/user/cart/view', 'HomeController@cart')->name('user.cart.view');
Route::delete('/user/cart/{cart}/destroy', 'HomeController@cartDestroy')->name('user.cart.destroy');
