<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['CEP','lograduro','numero','complemento','bairro','cidade','estado'];
    
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
