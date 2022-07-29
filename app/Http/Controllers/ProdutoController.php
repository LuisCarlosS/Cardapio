<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\produto;

class ProdutoController extends Controller
{
    public function salvarCategoria(Request $request){
        try{
            $categoria = new categoria;
            $categoria->nome_categoria = $request->input("nome_categoria");
            $categoria->descricao_categoria = $request->input("descricao_categoria");

            if(!$categoria->save()){
                return back()->withErrors($categoria->getErrors());
            }
            $request->session()->flash("success", "Categoria cadastrada com sucesso.");
        }catch(\Exception $e){
            \Log::error("Save Categoria", [ $e->getMessage()]);
            $request->session()->flash("error", "Categoria não cadastrada.");
        }

        return redirect()->route("admin.home");
    }
    
    public function salvarProduto(Request $request){
        try{
            $produto = new produto;
            $produto->nome_produto = $request->input("nome_produto");
            $produto->preco = $request->input("preco");
            $produto->foto = $request->file("foto") ? $request->file("foto")->getClientOriginalName() : null;
            $produto->descricao_produto = $request->input("descricao_produto");
            $produto->situacao = $request->input("situacao");
            $produto->categoria_id = $request->input("categoria_id");
            
            if ($request->hasFile('foto') && $request->foto->isValid()) {
                $nameFoto = $request->file("foto")->getClientOriginalName();
                $request->foto->storeAs('produtos', $nameFoto);
            }
            
            if(!$produto->save()){
                return back()->withErrors($produto->getErrors());
            }
            $request->session()->flash("success", "Produto cadastrado com sucesso.");
        }catch(\Exception $e){
            \Log::error("Save produto", [ $e->getMessage()]);
            $request->session()->flash("error", "Produto não cadastrado.");
        }
        return redirect()->route("admin.home");
    }

    public function mostrarProdutos($id = 0){
        $data = [];

        $queryproduto = new produto();
        $queryproduto = $queryproduto->orderBy("nome_produto.produtos");
        $data["listaProdutos"] = $queryproduto->get(['id_produto', 'nome_produto', 'preco', 'foto', 'descricao_produto', 'situacao', 'categoria_id']);

        $querycategoria = new categoria();
        $querycategoria = $querycategoria->orderBy("nome_categoria.categorias");
        $data["listaCategorias"] = $querycategoria->get(['id_categoria','nome_categoria', 'descricao_categoria']);

        return view("produto/mostrar-produtos", $data);
    }
}