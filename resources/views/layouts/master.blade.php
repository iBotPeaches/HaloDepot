<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>

<body>
    <div id="app">
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('home') }}">
                        Halo Depot
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="gamesDropdown">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="gamesDropdown" class="navbar-menu">
                    <div class="navbar-start">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Games
                            </a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item">
                                    Halo 2
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-end">
                        <div class="buttons">
                            <a class="button is-primary">
                                <strong>Upload</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong>Halo Depot</strong> by <a href="https://connortumbleson.com">Connor (iBotPeaches)</a>. The source code is available
                        <a href="https://github.com/iBotPeaches/HaloDepot">here</a> on GitHub.
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

<script type="application/javascript" src="{{ mix('js/app.js') }}"></script>
</html>
