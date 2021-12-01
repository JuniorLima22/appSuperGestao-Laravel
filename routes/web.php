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

Route::get('/', 'TesteController@index')->name('site.principal');
Route::get('/sobre-nos', 'TesteController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'TesteController@contato')->name('site.contato');
Route::post('/contato', 'TesteController@contato')->name('site.contato');
