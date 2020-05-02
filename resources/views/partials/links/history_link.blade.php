<?php
    /** @var App\Enums\Game $game */
    /** @var App\Enums\Map $map */
?>
<a class="{{ $map->is($mapEnum) ? 'is-active' : null }}" href="{{ route('history.index', ['game' => $game->getUrlSlug(), 'map' => $map->value]) }}">
    {{ $map->description }}
</a>
