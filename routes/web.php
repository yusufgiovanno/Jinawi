<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPenjualan;
use App\Http\Controllers\CCustomer;
use App\Http\Controllers\CProduk;
use App\Http\Controllers\CBahan;

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

//Master
//Bahan
Route::get ('/master-bahan',                [CBahan::class,     'index'  ]);
Route::post('/master-bahan/insert',         [CBahan::class,     'store'  ]);
Route::post('/master-bahan/update',         [CBahan::class,     'update' ]);
Route::get ('/master-bahan/delete/{id}',    [CBahan::class,     'destroy']);
//Customer
Route::get ('/master-customer',             [CCustomer::class,  'index'  ]);
Route::post('/master-customer/insert',      [CCustomer::class,  'store'  ]);
Route::post('/master-customer/update',      [CCustomer::class,  'update' ]);
Route::get ('/master-customer/delete/{id}', [CCustomer::class,  'destroy']);
//Produk
Route::get ('/master-produk',               [CProduk::class,    'index'  ]);
Route::post('/master-produk/insert',        [CProduk::class,    'store'  ]);
Route::post('/master-produk/update',        [CProduk::class,    'update' ]);
Route::get ('/master-produk/delete/{id}',   [CProduk::class,    'destroy']);
//Penjualan
Route::get ('/penjualan',                   [CPenjualan::class, 'index'  ]);
Route::post('/penjualan/insert',            [CPenjualan::class, 'store'  ]);
Route::get ('/penjualan/complete/{id}',     [CPenjualan::class, 'edit'   ]);
