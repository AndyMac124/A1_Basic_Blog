<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="{{ asset('js/color-modes.js') }}"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <title>COSC360 A1 Basic Blog</title>

        <!-- Styles -->
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .enter {
                font-size: 3rem;
                background-color: transparent;
                color: grey;
                cursor: pointer;
                padding: 12px;
                border: 1px solid grey;
                border-radius: 5px;
            }
            .enter:hover {
                color: #00b1eb;
                border: 1px solid #00b1eb;
                box-shadow: 0 0 10px rgba(0, 177, 235, 0.7);
            }
        </style>
    </head>
    <body>
        <a href="{{ url('/posts') }}" class="enter">Enter Site</a>
    </body>
</html>
