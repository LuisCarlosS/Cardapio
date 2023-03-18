@extends("admin.layoutadmin")
@section("conteudo")
    <main class="container conteudo">
        <div class="row pt-4">
            <div class="col-3 cadastrar-categoria">
                <h4 class="mb-3">Cadastrar categoria</h4>
                <form action="{{ route('produto.salvar-categoria') }}" method="post">
                    <input type="hidden" name="id" value="{{ $categ->id}}">
                    @csrf
                    <div class="column">
                        <div class="form-group mb-2">
                            <label>Nome da categoria:</label><br>
                            <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" maxlength="30" value="{{ $categ->nome_categoria }}">
                        </div>
                        <div class="form-group desc">
                            <label>Descrição:</label><br>
                            <textarea type="text" name="descricao_categoria" id="descricao_categoria" class="form-control" maxlength="70">{{ $categ->descricao_categoria }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-primary mt-2 float-end">
                        </div>
                    </div>
                </form>

                @if(isset($listaCategorias) && count($listaCategorias) > 0)
                    <div class="container p-0 table">
                        <div class="row justify-content-center">
                            <div class="table-responsive-lg">
                                <table class="table table-bordered table-hover table-sm table-striped" style="min-width: 280px; font-size: smaller;">
                                    <thead style="background-color: #ea1d2c;">
                                        <tr>
                                            <th>NOME</th>
                                            <th>DESCRIÇÃO</th>
                                            <th>EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listaCategorias as $categorias)
                                            <tr>
                                                <td>{{ $categorias->nome_categoria }}</td>
                                                <td>{{ $categorias->descricao_categoria }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-12 deletar d-flex justify-content-center">
                                                            <abbr title="Editar"><a href="{{ route('produto.editar-categoria', ['id' => $categorias->id]) }}" class="btn-delete btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a></abbr>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="col-9 ps-4 dados-produto">
                <h3 class="mb-3">Dados do produto</h3>
                <form action="{{ route('produto.salvar-produto') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $prod->id}}">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-9">
                            <label>Nome:</label><br>
                            <input type="text" name="nome_produto" id="nome_produto" class="form-control" maxlength="50" value="{{ $prod->nome_produto }}">
                        </div>
                        <div class="form-group mb-2 col-3">
                            <label>Preço:</label><br>
                            <input type="text" name="preco" id="preco" class="form-control money" value="{{ $prod->preco }}">
                        </div>
                        <div class="form-group mb-2 col-4">
                            <label>Foto:</label><br>
                            <input type="file" name="foto" id="foto" class="form-control" value="{{ $prod->foto }}">
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label>Situação:</label><br>
                            <select name="situacao" id="situacao" class="form-control">
                                <option value="{{ $prod->situacao }}"></option>
                                <option value="1" <?php echo $prod->situacao == '1'?'selected':'';?>>Habilitado</option>
                                <option value="0" <?php echo $prod->situacao == '0'?'selected':'';?>>Desabilitado</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 col-4">
                            <label>Categoria:</label><br>
                            <select name="categoria_id" id="categoria_id" class="form-control">
                                <option value=""></option>
                                @if(isset($listaCategorias))
                                    @foreach($listaCategorias as $categorias)
                                    <option value="{{ $categorias->id }}" @if($categorias->id == $prod->categoria_id) selected @endif>{{ $categorias->nome_categoria }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-2 col-12 desc">
                            <label>Descrição:</label><br>
                            <textarea name="descricao_produto" id="descricao_produto" class="form-control" maxlength="180">{{ $prod->descricao_produto }}</textarea>
                        </div>
                    </div>
                    <input type="submit" value="Salvar" class="btn btn-primary float-end">
                </form>

                @if(isset($listaProdutos) && count($listaProdutos) > 0)
                    <div class="container p-0 table">
                        <div class="row justify-content-center">
                            <div class="table-responsive-lg">
                                <table class="table table-bordered table-hover table-sm table-striped" style="min-width: 500px; font-size: smaller;">
                                    <thead style="background-color: #ea1d2c;">
                                        <tr>
                                            <th>NOME</th>
                                            <th>PREÇO</th>
                                            <th>FOTO</th>
                                            <th>SITUAÇÃO</th>
                                            <th>CATEGORIA</th>
                                            <th>DESCRIÇÃO</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listaProdutos as $produtos)
                                            <tr>
                                                <td>{{ $produtos->nome_produto }}</td>
                                                <td>R$ {{ $produtos->preco }}</td>
                                                <td class="d-flex justify-content-center"><a href="../../storage/app/produtos/{{ $produtos->foto }}"><img src="../../storage/app/produtos/{{ $produtos->foto }}" alt="" style="width: 60px;"></a></td>
                                                <td><?php if($produtos->situacao == 1){echo "Habilitado";} else{echo "Desabilitado";}?></td>
                                                <td><?php if($categorias->id == $produtos->categoria_id){echo "$categorias->nome_categoria";}?></td>
                                                <td>{{ $produtos->descricao_produto }}</td>
                                                <td>
                                                    <div class="row acao">
                                                        <div class="col-6 editar d-flex justify-content-center">
                                                            <form action="{{ route('produto.deletar-produto', ['id' => $produtos->idproduto]) }}" method="post" class="d-inline-block" onsubmit="return confirm('Deseja realmente realizar a exclusão?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <abbr title="Deletar"><button type="submit" class="btn btn-sm btn-danger btn-edit"><i class="fas fa-trash-alt"></i></button></abbr>
                                                            </form>
                                                        </div>
                                                        <div class="col-6 deletar d-flex justify-content-center">
                                                            <abbr title="Editar"><a href="{{ route('produto.editar-produto', ['id' => $produtos->idproduto]) }}" class="btn-delete btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a></abbr>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection