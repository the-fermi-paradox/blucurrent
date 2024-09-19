<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Font Awesome -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
        />
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Hello, MDBootstrap!</h1>
            <button class="btn btn-primary">Click Me</button>
        </div>
        <div class="container mt-5 center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue">
                    <li class="page-item ">
                        <a class="page-link" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link">1</a></li>
                    <li class="page-item active">
                        <a class="page-link">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item ">
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </body>
</html>
