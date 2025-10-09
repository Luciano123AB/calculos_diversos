<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto: Calculos Diversos</title>
    @include("layouts.partials.links")

    @include("layouts.partials.estilos")
</head>
<body class="bg-primary text-center fst-italic">
    @yield("content")

    <footer class="mt-5 mb-2">
        <img src="{{ asset("assets/images/foto_proprietario.png") }}" style="width: 35px; height: 35px;" class="border border-black shadow"> 
        
        Todos os Direitos Reservados: Luciano Eduardo Stefanello da Silva - 2025
    </footer>

    @include("layouts.partials.scripts")
</body>
</html>