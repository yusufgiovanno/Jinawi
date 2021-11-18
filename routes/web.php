<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CBahan;
use App\Http\Controllers\CCustomer;

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
Route::get ('/master-bahan',             [CBahan::class, 'index'  ]);
Route::post('/master-bahan/insert',      [CBahan::class, 'store'  ]);
Route::post('/master-bahan/update',      [CBahan::class, 'update' ]);
Route::get ('/master-bahan/delete/{id}', [CBahan::class, 'destroy']);
//Customer
Route::get ('/master-customer',             [CCustomer::class, 'index'  ]);
Route::post('/master-customer/insert',      [CCustomer::class, 'store'  ]);
Route::post('/master-customer/update',      [CCustomer::class, 'update' ]);
Route::get ('/master-customer/delete/{id}', [CCustomer::class, 'destroy']);
