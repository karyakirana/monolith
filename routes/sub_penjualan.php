<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| seluruh route tentang penjualan dan retur penjualan
| beserta reportnya
*/

Route::get('sub-penjualan/penjualan')->name('sub-penjualan.penjualan');
Route::get('sub-penjualan/penjualan/form')->name('sub-penjualan.form');
Route::get('sub-penjualan/penjualan/form/{penjualan_id}/edit')->name('sub-penjualan.form.edit');

Route::get('sub-penjualan/penjualan-retur')->name('sub-penjualan.penjualan-retur');
Route::get('sub-penjualan/penjualan-retur/form')->name('sub-penjualan.penjualan-retur.form');
Route::get('sub-penjualan/penjualan-retur/form/{penjualan_retur_id}')->name('sub-penjualan.penjualan-retur.form.edit');

/**
 * Laporan penjualan
 */


