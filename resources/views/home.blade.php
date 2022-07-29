@extends("layout")
@section("conteudo")
    <main class="container conteudo">
        <div class="row p-3">
            <div class="container-fluid novidades">
                <div class="titulo">
                    <h3>Categorias</h3>
                </div>
                <div class="categorias row mt-3">
                    @if(isset($listaCategorias))
                        @foreach($listaCategorias as $categorias)
                            <a href="#" class="col-2 text-center categoria m-3 p-2">
                                <h4>{{ $categorias->nome_categoria }}</h4>
                                <p>{{ $categorias->descricao_categoria }}</p>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

    