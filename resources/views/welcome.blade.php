<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                background-color: white;
                color: black;
                cursor: pointer;
                padding: 12px;
                border: 1px solid black;
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
