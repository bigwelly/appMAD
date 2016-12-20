<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dados extends Model
{
   protected $fillable = ['RG','numero','orgao','estadoCivil','categoria','empresa','profissao','renda'];
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
