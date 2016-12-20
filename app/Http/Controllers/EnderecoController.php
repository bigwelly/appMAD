<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EnderecoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function adicionar($id)
    {
    	$cliente = \App\Cliente::find($id);
    	return view('endereco.adicionar',compact('cliente'));
    }

    public function salvar(\App\Http\Requests\EnderecoRequest $request,$id)
    {
    	$endereco = new \App\Endereco;
    	$endereco->CEP = $request->input('CEP');
    	$endereco->lograduro = $request->input('lograduro');
        $endereco->numero = $request->input('numero');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        
    	\App\Cliente::find($id)->addEndereco($endereco);

    	\Session::flash('flash_message',[
			'msg'=>"Endereço adicionado com Sucesso!",
			'class'=>"alert-success"
    	]);

    	return redirect()->route('cliente.detalhe',$id);    	
    }

    public function editar($id)
    {
        $endereco = \App\Endereco::find($id);
        if(!$endereco){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse endereco cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.detalhe',$endereco->cliente->id);
        }

        return view('endereco.editar',compact('endereco'));
    }

    public function atualizar(\App\Http\Requests\EnderecoRequest $request,$id)
    {
        $endereco = \App\Endereco::find($id);
        $endereco->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Endereco atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe',$endereco->cliente->id);        
        
    }

    public function deletar($id)
    {
        $endereco = \App\Endereco::find($id);      

        $endereco->delete();

        \Session::flash('flash_message',[
            'msg'=>"Endereço deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe',$endereco->cliente->id); 
    }


}
