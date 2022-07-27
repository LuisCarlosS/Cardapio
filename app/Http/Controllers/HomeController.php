<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Models\categoria;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index(){
        $data = [];

        $queryproduto = new produto();
        $queryproduto = $queryproduto->orderBy("nome_produto.produtos");
        $data["listaProdutos"] = $queryproduto->get(['id_produto', 'nome_produto', 'preco', 'foto', 'descricao_produto', 'situacao', 'categoria_id']);

        $querycategoria = new categoria();
        $querycategoria = $querycategoria->orderBy("nome_categoria.categorias");
        $data["listaCategorias"] = $querycategoria->get(['id_categoria','nome_categoria', 'descricao_categoria']);

        return view("home", $data);
    }
    
    public function login(){
        $data = [];

        return view("login", $data);
    }

    public function carregarLogin(Request $request){
        $data = [];
        
        if($request->isMethod("POST")){
            $email = $request->input("email");
            $senha = $request->input("senha");

            if(Auth::attempt(['email' => $email, 'password' => $senha])){
                return \redirect()->route("admin.home");
            }else{
                $request->session()->flash("error", "E-mail / Senha inválidos");
                return \redirect()->route("login");
            }
        }

        return view("login", $data);
    }

    public function logout(){
        Auth::logout();
        return \redirect()->route("home");
    }
}