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
                    <a class="button is-fullwidth is-primary" href="{{ route('upload.show') }}">
                        <strong>Add Patch</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
