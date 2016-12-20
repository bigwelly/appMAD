<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$produtos = \App\Produto::paginate(15);

    	return view('produto.index',compact('produtos'));
    }
    public function adicionar()
    {
    	return view('produto.adicionar');
    }

    public function detalhe($id)
    {
        $produto = \App\Produto::find($id);
        return view('produto.detalhe',compact('produto'));
    }

    public function salvar(\App\Http\Requests\ProdutoRequest $request){
    	\App\Produto::create($request->all());

    	\Session::flash('flash_message',[
			'msg'=>"Produto adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produto.adicionar');
    }

    public function editar($id)
    {
        $produto = \App\Produto::find($id);
        if(!$produto){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse produto cadastrado! Deseja cadastrar um novo produto?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('produto.adicionar');
        }

        return view('produto.editar',compact('produto'));
    }

    public function atualizar(\App\Http\Requests\ProdutoRequest $request,$id)
    {
        \App\Produto::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Produto atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('produto.index');        
        
    }

    public function deletar($id)
    {
        $produto = \App\Produto::find($id);

        if(!$produto->deletarTelefones()){
            \Session::flash('flash_message',[
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('produto.index');
        }

        $produto->delete();

        \Session::flash('flash_message',[
            'msg'=>"Produto deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('produto.index'); 
    }

}


