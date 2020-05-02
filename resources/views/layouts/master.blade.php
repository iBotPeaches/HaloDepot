<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Artesaos\SEOTools\Facades\SEOTools::generate() !!}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>

<body>
    <div id="app">
        @include('partials.navigation')
        <div class="container">
            @yield('content')
            @include('partials.footer')
        </div>
    </div>
</body>

<script type="application/javascript" src="{{ mix('js/app.js') }}"></script>
</html>
