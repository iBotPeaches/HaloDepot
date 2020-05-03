<?php
    /** @var App\Patch $patch */
    /** @var bool $showGame */
?>
<div class="table-container">
    <table class="table is-fullwidth">
        <thead>
        <tr>
            <th>Mod</th>
            <th>Author</th>
            @if ($showGame)<th>Game</th>@endif
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patches as $patch)
            <tr>
                <td>
                    <a href="{{ route('patch.show', [$patch]) }}">
                        {{ $patch->name }}
                    </a>
                </td>
                <td>{{ $patch->author }}</td>
                @if ($showGame)<td>{{ $patch->game->description }}</td>@endif
                <td>
                    {{ \Illuminate\Support\Str::limit($patch->description, 75) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
