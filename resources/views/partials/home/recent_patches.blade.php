<?php
    /** @var App\Patch $patch */
?>
<table class="table is-fullwidth">
    <thead>
    <tr>
        <th>Mod</th>
        <th>Author</th>
        <th>Game</th>
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
                <td>{{ $patch->game->description }}</td>
                <td>
                    {{ \Illuminate\Support\Str::limit($patch->description, 75) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
