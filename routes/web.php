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
| Tambahan :
| authentication, authorization,
| another route page on each subapp
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('closedcash')->name('closedcash');

require __DIR__.'/auth.php';
require __DIR__.'/sub_penjualan.php';
require __DIR__.'/sub_master.php';
require __DIR__.'/sub_keuangan.php';
