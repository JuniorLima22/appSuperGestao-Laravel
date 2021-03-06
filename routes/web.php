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
    
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::match(['get', 'post'], '/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@gravar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::put('/fornecedor/atualizar/{id}', 'FornecedorController@atualizar')->name('app.fornecedor.atualizar');
    Route::delete('/fornecedor/deletar/{id}', 'FornecedorController@deletar')->name('app.fornecedor.deletar');

    Route::resource('produto', 'ProdutoController');
    Route::resource('produto-detalhe', 'ProdutoDetalheController');
    
    Route::resource('cliente', 'ClienteController');
    
    Route::resource('pedido', 'PedidoController');
    // Route::resource('pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido_id}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedidoProduto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');
});
