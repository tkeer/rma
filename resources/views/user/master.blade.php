<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ mix('/css/web.css') }}">

    @stack('styles')

</head>
<body class="antialiased">
<div id="app">
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Resources management</span>
        </a>

        <ul class="nav nav-pills">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs("pdfs") ? 'active' : '' }}" href="{{ route("pdfs") }}">
                    <span>Pdf</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs("snippets") ? 'active' : '' }}" href="{{ route("snippets") }}">
                    <span>Html snippet</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs("links") ? 'active' : '' }}" href="{{ route("links") }}">
                    <span>Link</span>
                </a>
            </li>
        </ul>
    </header>

    <div class="container">
        <div class="container mb-3 d-flex justify-content-between">
            <h2>@yield("sectionTitle")</h2>
        </div>

        @yield('content')
    </div>
</div>

</div>

@stack('scripts')

</body>
</html>
