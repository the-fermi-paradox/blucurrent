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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

</head>
<body>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 mb-4 mb-lg-0">
                <div class="card mb-3 pt-5 pb-5" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center flex-column justify-content-center gradient-custom text-center text-black"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <h5>{{ $empire->name }}</h5>
                            <p class="text-black">{{ $empire->release->name }}</p>
                            <p class="text-black">
                                {{ DateTime::createFromFormat('Y-m-d',
                                $empire->release->release_date)->format('F jS, Y') }}</p>
                            <a href="{{ route('empire.update', ['id' => $empire->id]) }}"><i class="far fa-edit mb-5"></i></a>
                        </div>
                        <div class="col-md-8 d-flex flex-column">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Architecture</h6>
                                        <p class="text-muted">{{ $empire->architecture }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Continent</h6>
                                        <p class="text-muted">{{ $empire->continent }}</p>
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-8 mb-3">
                                        <h6>Focus</h6>
                                        <p class="text-muted">{{ $empire->focus }}</p>
                                    </div>
                                </div>
                                <h6>Uniques</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Units</h6>
                                        <p class="text-muted">{{ $empire->unique_units }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Technology</h6>
                                        <p class="text-muted">{{ $empire->unique_technologies }}</p>
                                    </div>
                                    @if($empire->unique_buildings !== null)
                                        <div class="row pt-1">
                                            <div class="col-8 mb-3">
                                                <h6>Buildings</h6>
                                                <p class="text-muted">{{ $empire->unique_buildings }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a class="btn btn-primary" href={{ route('empire.list') }}>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
