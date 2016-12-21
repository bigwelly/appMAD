<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EnderecoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'CEP.required'=>'Preencha um CEP',
            'lograduro.required'=>'Preencha um Lograduro',
            'lograduro.max'=>'v deve ter até 255 caracteres',            
            'numero.required'=>'Preencha um Número',
            'complemento.required'=>'Preencha um complemento',
            'bairro.required'=>'Preencha um bairro',
            'cidade.required'=>'Preencha um cidade',
            'estado.required'=>'Preencha um estado'

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CEP'=>'required|max:255',            
            'lograduro'=>'required',
            'numero'=>'required',
            'complemento'=>'required',
            'bairro'=>'required',
            'cidade'=>'required',
            'estado'=>'required'
        ];
    }
}
