<?php

use Illuminate\Support\Facades\Route;

/**
 * master keuangan
 */
Route::get('sub_keuangan');
Route::get('sub_keuangan/master');
Route::get('sub_keuangan/master/akun');
Route::get('sub_keuangan/master/akun/kategori');
Route::get('sub_keuangan/master/akun/tipe');

/**
 * config keuangan
 */
Route::get('sub_keuangan/config/transaksi');
Route::get('sub_keuangan/config/hppinternal');
