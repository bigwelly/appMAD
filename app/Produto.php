<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','tamanho','largura','peso','data'];
    
    public function categoria()
    {
    	return $this->hasMany('App\Categoria');
    }

    public function addCategoria(Categoria $cat)
    {
    	return $this->categoria()->save($cat);
    }

    public function deletarCategorias()
    {
    	foreach ($this->categorias as $cat) {
    		$cat->delete();
    	}

    	return true;
    }
}
