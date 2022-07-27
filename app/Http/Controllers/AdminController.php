<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\produto;

class AdminController extends Controller
{
    public function indexAdmin($id = 0){
        $data = [];

        $p = new produto();

        if($id != 0){
            $p = produto::find($id);
        }                               
        $queryproduto = produto::join("categorias", "produtos.categoria_id", "=", "categoria.id_categoria");

        $data["produtos"] = $p;
        $querycategoria = new categoria();
        $querycategoria = $querycategoria->orderBy("nome_categoria.categorias");
        $data["listaCategorias"] = $querycategoria->get(['id_categoria','nome_categoria', 'descricao_categoria']);
        $data["listaProdutos"] = $queryproduto->get(['id_produto', 'nome_produto', 'preco', 'foto', 'descricao_produto', 'situacao', 'categoria_id']);
        

        return view("admin/home", $data);
    }

}