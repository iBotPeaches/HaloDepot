<aside class="menu">
    <p class="menu-label">
        Games
    </p>
    <ul class="menu-list">
        @foreach (App\Enums\Game::getInstances() as $game)
            <li>
                <a href="{{ route('history.index', ['game' => $game->getUrlSlug()]) }}"
                   class="{{ $game->is($gameEnum) ? 'is-active' : null }}"
                >
                    {{ $game->description }}
                </a>
            </li>
        @endforeach
    </ul>
    <p class="menu-label">
        Maps (Multiplayer)
    </p>
    <ul class="menu-list">
        @foreach ($maps['mp'] ?? [] as $map)
            <li>@include('partials.links.history_link', ['map' => $map, 'game' => $gameEnum])</li>
        @endforeach
    </ul>
    <p class="menu-label">
        Maps (Campaign)
    </p>
    <ul class="menu-list">
        @foreach ($maps['sp'] ?? [] as $map)
            <li>@include('partials.links.history_link', ['map' => $map, 'game' => $gameEnum])</li>
        @endforeach
    </ul>
</aside>
