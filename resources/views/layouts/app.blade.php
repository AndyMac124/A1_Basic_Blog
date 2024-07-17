<!DOCTYPE html>
<html>
    <head>
        <title>Base Blog Template</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    </head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Modified Styles -->
        <style>
            h1, h2, h3, h4 {
                text-align: center;
            }
            h1 {
                margin: 15px;
                margin-bottom: 25px;
            }
            h4 {
                font-size: 1.2rem;
            }
            .btn {
                margin: 5px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
