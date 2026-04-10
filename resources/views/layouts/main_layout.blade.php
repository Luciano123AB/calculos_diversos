<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }}</title>
    @include("layouts.partials.links")

    @include("layouts.partials.styles.estilos")
    @vite([
        "resources/css/app.css",
        "resources/js/app.js"
    ])
</head>
<body class="bg-primary text-center fst-italic d-flex flex-column min-vh-100">
    @yield("content")

    @include("layouts.partials.scripts.scripts")
</body>
</html>