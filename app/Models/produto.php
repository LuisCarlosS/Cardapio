<?php

namespace App\Models;

class produto extends BaseModel
{
    protected $table = "produtos";
    protected $fillable = ['nome_produto', 'preco', 'foto', 'descricao_produto', 'situacao', 'categoria_id'];

    public function beforeSave(){
        
    }

    protected $messages = [
        'nome_produto.required' => 'O campo nome é obrigatório.',
        'preco.required' => 'O campo preço é obrigatório.',
        'foto.required' => 'O campo foto é obrigatório.',
        'descricao_produto.required' => 'O campo descrição é obrigatório.',
        'situacao.required' => 'O campo situação é obrigatório.',
        'categoria_id.required' => 'O campo categoria é obrigatório.'
    ];

    public function rules(){
        return [
            'nome_produto' => 'required',
            'preco' => 'required',
            'foto' => 'required',
            'descricao_produto' => 'required',
            'situacao' => 'required',
            'categoria_id' => 'required',
        ];
    }
}
