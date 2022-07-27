<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class usuario extends BaseModel implements Authenticatable
{
    protected $table = "usuarios";
    protected $fillable = ['email', 'senha'];

   
    protected $messages = [
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.unique' => 'O e-mail já é cadastrado no sistema.',
        'email.email' => 'Preencha um e-mail válido.',
        'senha.required' => 'O campo senha é obrigatório.'
    ];

    public function rules(){
        return [
            'email' => 'required|unique:usuarios,email, ' . $this->id . '|email',
            'senha' => 'required'
        ];
    }

    public function beforeSave(){
        
    }

    public function getAuthIdentifierName(){
        return "id";
    }

    
    public function getAuthIdentifier(){
        return $this->id;
    }

    
    public function getAuthPassword(){
        return $this->senha;
    }

    
    public function getRememberToken(){

    }

    
    public function setRememberToken($value){

    }

    
    public function getRememberTokenName(){

    }
}