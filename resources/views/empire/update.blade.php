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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form novalidate method="post" class="needs-validation">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="name" class="form-control" value="{{$empire->name}}" required/>
                            <label class="form-label" for="name">Name</label>
                            <div class="invalid-feedback">Please choose a name.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <button
                                class="btn btn-primary dropdown-toggle w-100"
                                type="button"
                                id="dropdownMenuButton"
                                data-mdb-dropdown-init
                                data-mdb-ripple-init
                                aria-expanded="false"
                                data-id="{{$empire->release->id}}"
                            >
                                {{$empire->release->name}}
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                @foreach($releases as $release)
                                    <li class="dropdown-item w-100" onclick="dropdownMenuSet(this)">{{$release->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="architecture" class="form-control" value="{{$empire->architecture}}" required/>
                            <label class="form-label" for="architecture">Architecture</label>
                            <div class="invalid-feedback">Please choose an architecture.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="continent" class="form-control" value="{{$empire->continent}}" required/>
                            <label class="form-label" for="continent">Continent</label>
                            <div class="invalid-feedback">Please choose a continent.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="focus" class="form-control" value="{{$empire->focus}}" required/>
                            <label class="form-label" for="focus">Focus</label>
                            <div class="invalid-feedback">Please choose a focus.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="units" class="form-control" value="{{$empire->unique_units}}" required/>
                            <label class="form-label" for="units">Unique Units</label>
                            <div class="invalid-feedback">Please choose unique unit(s).</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="technologies" class="form-control" value="{{$empire->unique_technologies}}" required/>
                            <label class="form-label" for="technologies">Unique Technologies</label>
                            <div class="invalid-feedback">Please choose unique technologies.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="buildings" class="form-control" value="{{$empire->unique_buildings}}"/>
                            <label class="form-label" for="buildings">Unique Buildings</label>
                        </div>
                    </div>
                </div>

                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                <a href="/" data-mdb-ripple-init type="button" class="btn btn-cancel btn-block mb-4">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
