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
<div class="gradient-custom-2 h-100">
    <div class="mask d-flex align-items-center h-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-18">
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered mb-0">
                            <thead>
                            <tr>
                                @foreach($empires->first()->attributesToArray() as $key => $value)
                                <th scope="col">{{ $key }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empires as $empire)
                                <tr>
                                    @foreach($empire->attributesToArray() as $key => $value)
                                    <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $empires->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
