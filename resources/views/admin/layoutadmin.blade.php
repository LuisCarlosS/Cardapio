<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/8b08510799.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="container-fluid d-flex align-items-center justify-content-between topo">
        <div>
            <a href="{{ route('home') }}"><img src="{{ asset('imagens/logo.png') }}" alt="" class="logo"></a>
        </div>
        <div class="text-center favoritos">
            <a href="{{ route('logout') }}" class="p-2 me-3 login">Sair</a>
        </div>
    </header>

<div class="container">
    </div>
    @if(Session::has('success') && Session::get('success') != '')
    <div class="m-2 alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    @if(Session::has('error') && Session::get('error') != '')
    <div class="m-2 alert alert-warning">
        {{ Session::get('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="m-2 alert alert-warning">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
    
    @yield("conteudo")

    
    <footer class="mt-3 rodape">
        <div class="text-muted text-center p-2">
            &copy; Copyright <strong>Todos os direitos reservados.</strong>
        </div>
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
   $('.money').mask('000.000.000.000.000,00', {reverse: true});
  
  $(".money").change(function(){
    $("#value").html($(this).val().replace(/\D/g,''))
  })
  
});
</script>
</html>