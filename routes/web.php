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
    return view('home');
});

Route::resource('/komoditas', 'KomoditasController');
Route::get('/komoditas/destroy/{id}', 'KomoditasController@destroy')->name('komoditas.destroy');
Route::resource('/produksi', 'ProduksiController');
Route::get('/produksi/destroy/{id}', 'ProduksiController@destroy')->name('produksi.destroy');
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
