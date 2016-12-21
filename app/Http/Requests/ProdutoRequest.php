<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdutoRequest extends Request
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
            'nome.required'=>'Preencha um nome',
            'nome.max'=>'Nome deve ter até 255 caracteres',
            'tamanho.required'=>'Preencha um tamanho',
            'largura.required'=>'Preencha uma largura',
            'peso.required'=>'Preencha um peso',
            'data.required'=>'Preencha uma data de fabricação'

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
            'nome'=>'required|max:255',
            'tamanho'=>'required',
            'largura'=>'required',
            'peso'=>'required',
            'data'=>'required',
        ];
    }
}
