@extends('layouts.master')

@section('title', 'Halo Depot')

@section('content')
    <br />
    <div class="columns">
        <div class="column is-12">
            <h3 class="title is-3">{{ $patchEnum->description }} Patches</h3>
            @include('partials.home.recent_patches', ['patches' => $patches, 'showGame' => true])
            {{ $patches->links() }}
        </div>
    </div>
@stop
