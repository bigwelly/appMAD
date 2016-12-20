<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DadoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function adicionar($id)
    {
    	$cliente = \App\Cliente::find($id);
    	return view('dado.adicionar',compact('cliente'));
    }

    public function salvar(\App\Http\Requests\DadoRequest $request,$id)
    {
    	$dado = new \App\Dado;        
    	$dado->RG = $request->input('RG');
    	$dado->numero = $request->input('numero');
        $dado->orgao = $request->input('orgao');
        $dado->estadoCivil = $request->input('estadoCivil');
        $dado->categoria = $request->input('categoria');
        $dado->empresa = $request->input('empresa');
        $dado->profissao = $request->input('profissao');
        $dado->renda = $request->input('renda');
        
    	\App\Cliente::find($id)->addDado($dado);

    	\Session::flash('flash_message',[
			'msg'=>"Dados adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('cliente.detalhe',$id);    	
    }

    public function editar($id)
    {
        $dado = \App\Dado::find($id);
        if(!$dado){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse dado cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.detalhe',$dado->cliente->id);
        }

        return view('dado.editar',compact('dado'));
    }

    public function atualizar(\App\Http\Requests\DadoRequest $request,$id)
    {
        $dado = \App\Dado::find($id);
        $dado->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Dado atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe',$dado->cliente->id);        
        
    }

    public function deletar($id)
    {
        $dado = \App\Dado::find($id);      

        $dado->delete();

        \Session::flash('flash_message',[
            'msg'=>"Dados deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe',$dado->cliente->id); 
    }


}
