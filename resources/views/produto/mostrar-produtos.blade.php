@extends("layout")
@section("conteudo")

<main class="container conteudo">
    <div class="row p-3 justify-content-around">
        @if(isset($listaProdutos))
            @foreach($listaProdutos as $produtos)
                @if($categ->id == $produtos->categoria_id && $produtos->situacao == 1)
                    <div class="col-5 card p-3 me-3">
                        <div class="col-8 detalhes-produto me-3">
                            <h4>{{ $produtos->nome_produto }}</h4>
                            <p>{{ $produtos->descricao_produto }}</p>
                            <span>R$ {{ $produtos->preco }}</span>
                        </div>
                        <div class="col-4 img-produto">
                            <img src="../../../storage/app/produtos/{{ $produtos->foto }}" alt="image">
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</main>

@endsection