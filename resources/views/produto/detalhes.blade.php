@extends("layout")
@section("conteudo")
<main class="container conteudo">
        <div class="row p-3">
            <div class="col-2 produtos">
                <h3>Produtos</h3>
                <ul>
                @if(isset($listaTipos))
                    @foreach($listaTipos as $tipo_produtos)
                        <a href=""><li>{{ $tipo_produtos->tipo }}</li></a>
                    @endforeach
                @endif
                </ul>
            </div>
            <div class="col-10 container-fluid novidades">
                <div class="titulo">
                    <h3>Detalhes do produto</h3>
                </div>
                
                    @foreach($listaProdutos as $produtos)
                        @if(count($produtos) > 0 && $produtos->id == $this->idclassificado)
                            <section class="container-fluid p-0" id="dtl">
                            <div class="row justify-content-center">
                                <div class="col-2 row justify-content-center">
                                <?php if($anuncio["imagem1"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1" id="mini1"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem1"]; ?>" alt="image"></div>
                                <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                <?php if($anuncio["imagem2"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1" id="mini2"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem2"]; ?>" alt="image"></div>
                                <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    <?php if($anuncio["imagem3"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1" id="mini3"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem3"]; ?>" alt="image"></div>
                                <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    <?php if($anuncio["imagem4"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1" id="mini4"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem4"]; ?>" alt="image"></div>
                                <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                </div>
                                <div class="col-5">
                                <div class="img-large">
                                    <div id="imagem0">
                                    <?php if($anuncio["imagem1"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1"><a href="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem1"]; ?>" data-lightbox="roadtrip"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem1"]; ?>" alt="image"></a></div>
                                    <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    </div>

                                    <div id="imagem1" class="hide">
                                    <?php if($anuncio["imagem1"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1"><a href="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem1"]; ?>" data-lightbox="roadtrip"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem1"]; ?>" alt="image"></a></div>
                                    <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    </div>

                                    <div id="imagem2" class="hide">
                                    <?php if($anuncio["imagem2"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1"><a href="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem2"]; ?>" data-lightbox="roadtrip"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem2"]; ?>" alt="image"></a></div>
                                    <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    </div>

                                    <div id="imagem3" class="hide">
                                    <?php if($anuncio["imagem3"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1"><a href="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem3"]; ?>" data-lightbox="roadtrip"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem3"]; ?>" alt="image"></a></div>
                                    <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    </div>

                                    <div id="imagem4" class="hide">
                                    <?php if($anuncio["imagem4"] != ""){  ?>
                                    <div class="col-11 img-mini mb-1"><a href="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem4"]; ?>" data-lightbox="roadtrip"><img src="<?php echo $this->baseUrl(); ?>/temparquivos/<?php echo $anuncio["imagem4"]; ?>" alt="image"></a></div>
                                    <?php  } else {?>
                                    <div class="col-11 img-mini mb-1"><img src="<?php echo $this->baseUrl(); ?>/foto.jpg" alt="image"></div>
                                    <?php  }?>
                                    </div>
                                </div>
                                </div>
                                <div class="col-5">
                                <div class="detalhes">
                                    <div class="col-12">
                                        <h2 class="mb-0"><b><?php echo $anuncio["titulo"]; ?></b></h2>
                                    </div>
                                    <div class="col-12 categ-dtl">
                                        <p class="mb-2">Categoria: <a href="<?php echo $this->url(array('controller' => 'Classificado', 'action' => 'categorias', 'categoria' => $anuncio["categoria"]), NULL, true); ?>"><?php echo $anuncio["categoria"]; ?></a></p>
                                    </div>
                                    <div class="col-12">
                                        <h2><b>R$ <?php echo $anuncio["valor"]; ?></b></h2>
                                    </div>
                                    <div class="col-12">
                                        <p><?php echo $anuncio["descricao"]; ?></p>
                                    </div>
                                    <div class="col-12">
                                    <h4 class="mb-2"><b>Contato do morador</b></h4>
                                    <p><b>Nome:</b> <?php echo $anuncio["nome"]; ?><br>
                                        <b>Bl/Apto:</b> <?php echo $anuncio["bloco"]; ?> / <?php echo $anuncio["apartamento"]; ?><br>
                                        <b>Telefone:</b> (<?php echo $anuncio["ddd"]; ?>) <?php echo $anuncio["numero"]; ?><br>
                                        <b>E-mail:</b> <?php echo $anuncio["email"]; ?></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 mb-5 mt-4">
                                <a href="<?php echo $this->url(array('controller' => 'Classificado', 'action' => 'ofertas'), NULL, true); ?>" class="float-end" style="text-decoration: underline; font-size: 1rem"><b>Voltar</b></a>
                            </div>
                            </section>
                        @endif
                    @endforeach


            </div>
        </div>
    </main>

@endsection