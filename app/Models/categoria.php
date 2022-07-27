<?php

namespace App\Models;

class tipo_produto extends BaseModel
{
    protected $table = "categorias";
    protected $fillable = ['nome_categoria', 'descricao_categoria'];

    public function beforeSave(){
        
    }

    protected $messages = [
        'nome_categoria.required' => 'Campo nome vazio.',
        'descricao_categoria.required' => 'Campo descrição vazio.'
    ];

    public function rules(){
        return [
            'nome_categoria' => 'required',
            'descricao_categoria' => 'required'
        ];
    }
}