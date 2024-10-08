<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<body>
<div class="gradient-custom-2 h-100">
    <div class="mask d-flex align-items-center h-100">
        <div class="container">
            @foreach($empires as $empire)
                <x-delete-modal :$empire/>
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
                                        <a href="{{ route('empire.update', ['id'=>$empire->id]) }}"><i class="fas fa-fw fa-lg fa-pen-to-square"></i></a>
                                        <button class="fake-button" type="button" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modal-{{ $empire->id }}"><i class="fas fa-fw fa-lg fa-trash-can"></i></button>
                                    </td>
                                    <td><a href="{{ route('empire.show', ['id' => $empire->id]) }}">{{ $empire->name }}</a></td>
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
