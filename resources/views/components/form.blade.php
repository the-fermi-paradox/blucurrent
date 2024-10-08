<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white" style="border-radius:.5rem">
            <form novalidate method="post" class="needs-validation">
                @csrf
                @if($empire !== null)
                    @method('PUT')
                @endif
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $empire?->name }}" required/>
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
                                data-id="{{ $empire !== null ? $empire->release->id : $releases->first()?->id }}"
                            >
                                {{ $empire !== null ? $empire->release->name : $releases->first()?->name }}
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                @foreach($releases as $release)
                                    <li class="dropdown-item w-100" data-id="{{ $release->id }}" onclick="dropdownMenuSet(this)">{{ $release->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="architecture" id="architecture" class="form-control" value="{{ $empire?->architecture }}" required/>
                            <label class="form-label" for="architecture">Architecture</label>
                            <div class="invalid-feedback">Please choose an architecture.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="continent" id="continent" class="form-control" value="{{ $empire?->continent }}" required/>
                            <label class="form-label" for="continent">Continent</label>
                            <div class="invalid-feedback">Please choose a continent.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="focus" id="focus" class="form-control" value="{{ $empire?->focus }}" required/>
                            <label class="form-label" for="focus">Focus</label>
                            <div class="invalid-feedback">Please choose a focus.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="unique_units" id="unique_units" class="form-control" value="{{ $empire?->unique_units }}" required/>
                            <label class="form-label" for="unique_units">Unique Units</label>
                            <div class="invalid-feedback">Please choose unique unit(s).</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="unique_technologies" id="unique_technologies" class="form-control" value="{{ $empire?->unique_technologies }}" required/>
                            <label class="form-label" for="unique_technologies">Unique Technologies</label>
                            <div class="invalid-feedback">Please choose unique technologies.</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 mt-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" name="unique_buildings" id="unique_buildings" class="form-control" value="{{ $empire?->unique_buildings }}"/>
                            <label class="form-label" for="unique_buildings">Unique Buildings</label>
                        </div>
                    </div>
                </div>
                <input type="text" id="release_id" name="release_id" class="d-none" value="{{ $empire !== null ? $empire->release->id : $releases->first()?->id }}" required/>
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                <a href="{{ url()->previous() }}" data-mdb-ripple-init type="button" class="btn btn-secondary btn-block mb-4">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
