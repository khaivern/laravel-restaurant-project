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
Route::delete('/admin/{user}/destroy', 'AdminController@destroy')->name('admin.destroy');
Route::get('/admin/foodmenu', 'AdminController@foodMenu')->name('admin.foodmenu');
Route::post('/admin/foodmenu', 'AdminController@foodMenuStore')->name('foodmenu.store');
