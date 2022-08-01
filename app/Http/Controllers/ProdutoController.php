<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\produto;

class ProdutoController extends Controller
{
    public function salvarCategoria(Request $request){
        try{
            $id = $request->input("id", "");

            $categoria = new categoria;

            if($id != "" && is_numeric($id)){
                $categoria = categoria::find($id);
            }

            $categoria->fill($request->all());

            if(!$categoria->save()){
                return back()->withErrors($categoria->getErrors());
            }
            $request->session()->flash("success", "Categoria salva com sucesso.");
        }catch(\Exception $e){
            \Log::error("Save Categoria", [ $e->getMessage()]);
            $request->session()->flash("error", "Categoria não salva.");
        }

        return redirect()->route("admin.home");
    }
    
    public function salvarProduto(Request $request){
        try{
            $id = $request->input("id", "");

            $produto = new produto;

            if($id != "" && is_numeric($id)){
                $produto = produto::find($id);
            }

            $produto->nome_produto = $request->input("nome_produto");
            $produto->preco = $request->input("preco");
            $produto->descricao_produto = $request->input("descricao_produto");
            $produto->situacao = $request->input("situacao");
            $produto->categoria_id = $request->input("categoria_id");
            
            if ($request->hasFile('foto') && $request->foto->isValid()) {

                $requestFoto = $request->foto;

                $extension = $requestFoto->extension();

                $fotoName = md5($requestFoto->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $request->foto->storeAs('produtos', $fotoName);

                $produto->foto = $fotoName;
            }
            
            if(!$produto->save()){
                return back()->withErrors($produto->getErrors());
            }
            $request->session()->flash("success", "Produto salvo com sucesso.");
        }catch(\Exception $e){
            \Log::error("Save produto", [ $e->getMessage()]);
            $request->session()->flash("error", "Produto não salvo.");
        }
        return redirect()->route("admin.home");
    }

    public function mostrarProdutos($id = 0){
        $data = [];

        if($id != 0){
            $c = categoria::find($id);
        }
        $data["categ"] = $c;

        $queryproduto = new produto();
        $queryproduto = $queryproduto->orderBy("nome_produto");
        $data["listaProdutos"] = $queryproduto->get(['id', 'nome_produto', 'preco', 'foto', 'descricao_produto', 'situacao', 'categoria_id']);

        $querycategoria = new categoria();
        $querycategoria = $querycategoria->orderBy("nome_categoria");
        $data["listaCategorias"] = $querycategoria->get(['id','nome_categoria', 'descricao_categoria']);

        return view("produto/mostrar-produtos", $data);
    }

    public function editarCategoria($id = 0){
        $data = [];
        
        $c = new categoria();
        $p = new produto();

        if($id != 0){
            $c = categoria::find($id);
        } 

        $data["prod"] = $p;
        $data["categ"] = $c;

        return view("admin/home", $data);
    }

    public function editarProduto($id = 0){
        $data = [];

        $c = new categoria();
        $p = new produto();

        if($id != 0){
            $p = produto::find($id);
        } 

        $data["prod"] = $p;
        $data["categ"] = $c;

        $querycategoria = new categoria();
        $querycategoria = $querycategoria->orderBy("nome_categoria");
        $data["listaCategorias"] = $querycategoria->get(['id','nome_categoria', 'descricao_categoria']);

        return view("admin/home", $data);
    }

    public function deletarProduto($id, Request $request){

        produto::findOrFail($id)->delete();

        if($id == null){
            $request->session()->flash("error", "Não foi possível excluir o produto!");
            return back();
        }
        
        $request->session()->flash("success", "Produto excluído com sucesso!");
        return back();
    }
}