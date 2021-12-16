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

Route::get('/', 'PrincipalController@index')->name('site.principal')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/contato', 'ContatoController@index')->name('site.contato')->middleware('log.acesso');
Route::post('/contato', 'ContatoController@store')->name('site.contato');

Route::get('/login', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('log.acesso', 'autenticacao:ldap, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
});
