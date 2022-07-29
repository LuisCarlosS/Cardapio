@extends("admin.layoutadmin")
@section("conteudo")
    <main class="container conteudo">
        <div class="row pt-4">
            <div class="col-3 cadastrar-categoria">
                <h4 class="mb-3">Cadastrar categoria</h4>
                <form action="{{ route('produto.salvar-categoria') }}" method="post">
                    @csrf
                    <div class="column">
                        <div class="form-group mb-2">
                            <label>Nome da categoria:</label><br>
                            <input type="text" name="nome_categoria" id="nome_categoria" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Descrição:</label><br>
                            <textarea type="text" name="descricao_categoria" id="descricao_categoria" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-primary mt-3 float-end">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-9 ps-4">
                <h3 class="mb-3">Dados do produto</h3>
                <form action="{{ route('produto.salvar-produto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-9">
                            <label>Nome:</label><br>
                            <input type="text" name="nome_produto" id="nome_produto" class="form-control">
                        </div>
                        <div class="form-group mb-2 col-3">
                            <label>Preço:</label><br>
                            <input type="text" name="preco" id="preco" class="form-control">
                        </div>
                        <div class="form-group mb-2 col-4">
                            <label>Foto:</label><br>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="form-group mb-2 col-4">
                            <label>Categoria:</label><br>
                            <select name="tipo_produto_id" id="tipo_produto_id" class="form-control">
                                <option value=""></option>
                                @if(isset($listaCategorias))
                                    @foreach($listaCategorias as $categorias)
                                    <option value="{{ $categorias->id_categoria }}">{{ $categorias->nome_categoria }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-3 col-4">
                            <label>Situação:</label><br>
                            <select name="situacao" id="situacao" class="form-control">
                                <option value=""></option>
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </div>
                        <div class="form-group mb-2 col-12">
                            <label>Descrição:</label><br>
                            <textarea name="descricao_produto" id="descricao_produto" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Salvar" class="btn btn-primary float-end">
                </form>
            </div>
        </div>
    </main>
@endsection