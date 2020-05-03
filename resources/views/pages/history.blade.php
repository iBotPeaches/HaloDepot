@extends('layouts.master')

@section('title', 'Halo Depot')

@section('content')
    <br />
    <div class="columns">
        <div class="column is-3">
            @include('partials.history_navigation')
        </div>
        <div class="column is-9">
            @if ($patches->count() === 0)
                <div class="notification is-warning">
                    We don't have any mods with this filter :( - Can you add <a href="{{ route('upload.show') }}">one</a>?
                </div>
            @else
                @include('partials.home.recent_patches', ['patches' => $patches, 'showGame' => false])
                {{ $patches->links() }}
            @endif
        </div>
    </div>
@stop
