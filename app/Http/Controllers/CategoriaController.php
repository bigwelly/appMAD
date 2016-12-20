<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function adicionar($id)
    {
    	$produto = \App\Produto::find($id);
    	return view('categoria.adicionar',compact('produto'));
    }

    public function salvar(\App\Http\Requests\CategoriaRequest $request,$id)
    {
    	$categoria = new \App\Categoria;    	
    	$categoria->categoria = $request->input('categoria');

    	\App\Produto::find($id)->addCategoria($categoria);

    	\Session::flash('flash_message',[
			'msg'=>"Categoria adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('produto.detalhe',$id);
    	
    }

    public function editar($id)
    {
        $categoria = \App\Categoria::find($id);
        if(!$categoria){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse categoria cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('produto.detalhe',$categoria->produto->id);
        }

        return view('categoria.editar',compact('categoria'));
    }

    public function atualizar(\App\Http\Requests\CategoriaRequest $request,$id)
    {
        $categoria = \App\Categoria::find($id);
        $categoria->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Categoria atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('produto.detalhe',$categoria->produto->id);        
        
    }

    public function deletar($id)
    {
        $categoria = \App\Categoria::find($id);      

        $categoria->delete();

        \Session::flash('flash_message',[
            'msg'=>"Categoria deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('produto.detalhe',$categoria->produto->id); 
    }


}

