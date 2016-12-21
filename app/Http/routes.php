<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	//array_add()
	$array = ['nome'=>'Camila','idade'=>'20'];
	$array = array_add($array,'email','camila@mail.com');
	$array = array_add($array,'amigo','Guilherme');
	//dd($array);

	// array_collapse()
	$array = [['banana','limão'],['vermelho','azul']];
	$array = array_collapse($array);
	//dd($array);

	//array_divide()
	list($key,$value) = array_divide(['nome'=>'Camila','idade'=>'20']);
	//dd($key,$value);

	//array_except()
	$array = ['nome'=>'Camila','idade'=>'20'];
	$array = array_except($array,['nome']);
	//dd($array);

	//base_path()
	$path = base_path('Config');
	//dd($path);

	//database_path()
	$path = database_path();
	//dd($path);

	//public_path()
	$path = public_path();
	//dd($path);

	//storage_path()
	$path = storage_path();
	//dd($path);

	//camel_case()
	$text = "Guilherme esta criando uma nova aula";
	//dd(camel_case($text));

	//snake_case()
	$text = "GuilhermeEstaCriandoUmaNovaAula";
	//dd(snake_case($text));

	//str_limit()
	$text = "Guilherme esta criando uma nova aula";
	//dd(str_limit($text,5));





    return view('welcome');
});

Route::auth();

Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar','as'=>'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar','as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar','as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar','as'=>'cliente.deletar']);

Route::get('/cliente/detalhe/{id}',['uses'=>'ClienteController@detalhe','as'=>'cliente.detalhe']);
Route::get('/telefone/adicionar/{id}',['uses'=>'TelefoneController@adicionar','as'=>'telefone.adicionar']);
Route::post('/telefone/salvar/{id}',['uses'=>'TelefoneController@salvar','as'=>'telefone.salvar']);
Route::get('/endereco/adicionar/{id}',['uses'=>'EnderecoController@adicionar','as'=>'endereco.adicionar']);
Route::post('/endereco/salvar/{id}',['uses'=>'EnderecoController@salvar','as'=>'endereco.salvar']);

Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar','as'=>'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar','as'=>'telefone.atualizar']);
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar','as'=>'telefone.deletar']);

Route::get('/endereco/editar/{id}', ['uses'=>'EnderecoController@editar','as'=>'endereco.editar']);
Route::put('/endereco/atualizar/{id}', ['uses'=>'EnderecoController@atualizar','as'=>'endereco.atualizar']);
Route::get('/endereco/deletar/{id}', ['uses'=>'EnderecoController@deletar','as'=>'endereco.deletar']);

Route::get('/produto', ['uses'=>'ProdutoController@index','as'=>'produto.index']);
Route::get('/produto/adicionar', ['uses'=>'ProdutoController@adicionar','as'=>'produto.adicionar']);
Route::post('/produto/salvar', ['uses'=>'ProdutoController@salvar','as'=>'produto.salvar']);
Route::get('/produto/editar/{id}', ['uses'=>'ProdutoController@editar','as'=>'produto.editar']);
Route::put('/produto/atualizar/{id}', ['uses'=>'ProdutoController@atualizar','as'=>'produto.atualizar']);
Route::get('/produto/deletar/{id}', ['uses'=>'ProdutoController@deletar','as'=>'produto.deletar']);

Route::get('/produto/detalhe/{id}',['uses'=>'ProdutoController@detalhe','as'=>'produto.detalhe']);
Route::get('/categoria/adicionar/{id}',['uses'=>'CategoriaController@adicionar','as'=>'categoria.adicionar']);
Route::post('/categoria/salvar/{id}',['uses'=>'CategoriaController@salvar','as'=>'categoria.salvar']);

Route::get('/categoria/editar/{id}', ['uses'=>'CategoriaController@editar','as'=>'categoria.editar']);
Route::put('/categoria/atualizar/{id}', ['uses'=>'CategoriaController@atualizar','as'=>'categoria.atualizar']);
Route::get('/categoria/deletar/{id}', ['uses'=>'CategoriaController@deletar','as'=>'categoria.deletar']);