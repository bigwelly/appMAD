<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['CPF','nome','email'];

    public function telefones()
    {
    	return $this->hasMany('App\Telefone');
    }

    public function addTelefone(Telefone $tel)
    {
    	return $this->telefones()->save($tel);
    }

    public function deletarTelefones()
    {
    	foreach ($this->telefones as $tel) {
    		$tel->delete();
    	}

    	return true;
    }
    
    public function endereco()
    {
    	return $this->hasMany('App\Endereco');
    }

    public function addEndereco(Endereco $end)
    {
    	return $this->endereco()->save($end);
    }

    public function deletarEndereco()
    {
    	foreach ($this->endereco as $end) {
    		$end->delete();
    	}

    	return true;
    }
    
        public function dados()
    {
    	return $this->hasMany('App\Dados');
    }

    public function addDados(Dados $dados)
    {
    	return $this->dados()->save($dados);
    }

    public function deletarDados()
    {
    	foreach ($this->dados as $dados) {
    		$dados->delete();
    	}

    	return true;
    }
}
