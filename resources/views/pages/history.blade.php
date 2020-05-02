@extends('layouts.master')

@section('title', 'Halo Depot')

@section('content')
    <br />
    <div class="columns">
        <div class="column is-3">
            @include('partials.history_navigation')
        </div>
        <div class="column is-9">
            @include('partials.home.recent_patches', ['patches' => $patches])
            {{ $patches->links() }}
        </div>
    </div>
@stop
