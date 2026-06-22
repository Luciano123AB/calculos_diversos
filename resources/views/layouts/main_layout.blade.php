<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }}</title>
    <link rel="icon" href="{{ asset("favicon.ico") }}">
    
    @include("layouts.partials.links")

    @vite([
        "resources/css/app.css",
        "resources/js/app.js"
    ])
</head>
<body class="bg-primary text-center fst-italic d-flex flex-column min-vh-100">
    @yield("content")

    <script src="{{ asset("assets/js/main_scripts.js") }}"></script>
</body>
</html>