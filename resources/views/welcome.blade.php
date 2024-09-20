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
                <div class="col-xxl-12">
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="col">Name</th>
                                <th scope="col">Release</th>
                                <th scope="col">Architecture</th>
                                <th scope="col">Continent</th>
                                <th scope="col">Focus</th>
                                <th scope="col">Unique Units</th>
                                <th scope="col">Unique Technologies</th>
                                <th scope="col">Unique Buildings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empires as $empire)
                                <tr>
                                    <td>
                                        <a href="/update/{{$empire->id}}"><i class="fas fa-fw fa-lg fa-pen-to-square"></i></a>
                                        <a href="/api/releases"><i class="fas fa-fw fa-lg fa-trash-can"></i></a>
                                    </td>
                                    <td>{{ $empire->name }}</td>
                                    <td>{{ $empire->release?->name }}</td>
                                    <td>{{ $empire->architecture }}</td>
                                    <td>{{ $empire->continent }}</td>
                                    <td>{{ $empire->focus }}</td>
                                    <td>{{ $empire->unique_units }}</td>
                                    <td>{{ $empire->unique_technologies }}</td>
                                    <td>{{ $empire->unique_buildings ?? "N/A" }}</td>
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
