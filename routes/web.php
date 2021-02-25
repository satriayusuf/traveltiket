<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// user
Route::get('/home', 'HomeController@index')->name('home')->middleware('isUser');
Route::get('/home/pesan-tiket', 'HomeController@pesantiket')->name('pesantiket')->middleware('isUser');
Route::post('/home/pesan/store', 'HomeController@tiketproses')->name('tiketproses')->middleware('isUser');
Route::get('/home/tiket', 'HomeController@tiket')->name('tiket')->middleware('isUser');

// admin
Route::get('/admin', 'AdminController@index')->name('Admin')->middleware('isAdmin');
Route::get('/admin/pemesanan', 'AdminController@pemesanan')->name('pemesanan')->middleware('isAdmin');
Route::post('/admin/pemesanan/tiket/{id}', 'AdminController@pemesanantiket')->name('pemesanantiket')->middleware('isAdmin');
