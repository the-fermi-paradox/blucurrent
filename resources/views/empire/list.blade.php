<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Age of Empires II: Empires List</title>
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
            @foreach($empires as $empire)
            <div class="modal fade" id="modal-{{ $empire->id }}" tabindex="-1" aria-labelledby="modal-label-{{ $empire->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-label-{{ $empire->id }}">Delete {{ $empire->name }}</h5>
                            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Are you certain you want to delete {{ $empire->name }}?</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                            <form action="/empire/delete/{{ $empire->id }}" method="post">
                                @csrf
                                @method('DELETE');
                                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-xxl-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover border-primary">
                            <thead>
                            <tr>
                                <th scope="col">Actions</th>
                                <x-headcell :$col :$order cmp="name">Name</x-headcell>
                                <x-headcell :$col :$order cmp="release_id">Release</x-headcell>
                                <x-headcell :$col :$order cmp="architecture">Architecture</x-headcell>
                                <x-headcell :$col :$order cmp="continent">Continent</x-headcell>
                                <x-headcell :$col :$order cmp="focus">Focus</x-headcell>
                                <x-headcell :$col :$order cmp="unique_units">Unique Units</x-headcell>
                                <x-headcell :$col :$order cmp="unique_technologies">Unique Technologies</x-headcell>
                                <x-headcell :$col :$order cmp="unique_buildings">Unique Buildings</x-headcell>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($empires as $empire)
                                <tr>
                                    <td>
                                        <a href="/empire/update/{{ $empire->id }}"><i class="fas fa-fw fa-lg fa-pen-to-square"></i></a>
                                        <button class="fake-button" type="button" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modal-{{ $empire->id }}"><i class="fas fa-fw fa-lg fa-trash-can"></i></button>
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
                <a type="button" class="btn btn-primary" data-mdb-ripple-init href="/empire/create/">Create</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
