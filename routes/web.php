<?php

use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', 'PrincipalController@index')->name('site.principal')->middleware(LogAcessoMiddleware::class);
Route::get('/sobre-nos', 'PrincipalController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@index')->name('site.contato')->middleware(LogAcessoMiddleware::class);
Route::post('/contato', 'ContatoController@store')->name('site.contato');
