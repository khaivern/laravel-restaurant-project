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
Route::post('/admin/foodmenu', 'AdminController@foodMenuStore')->name('foodmenu.store');
Route::delete('/admin/{foodmenu}/foodDestroy', 'AdminController@foodMenuDestroy')->name('admin.foodmenu.destroy');
Route::get('/admin/{foodmenu}/edit', 'AdminController@foodMenuEdit')->name('admin.foodmenu.edit');
Route::patch('/admin/{foodmenu}/update', 'AdminController@foodMenuUpdate')->name('admin.foodmenu.update');



Route::post('/reservation/store', 'HomeController@store')->name('reservation.store');
