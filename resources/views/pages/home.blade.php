@extends('layouts.master')

@section('title', 'Halo Depot')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Halo Depot
                </h1>
                <h2 class="subtitle">
                    Providing patches so you don't have to go looking.
                </h2>
            </div>
        </div>
    </section>
    <br />
    <h3 class="is-size-4 title">Recent Patches</h3>
    @include('partials.home.recent_patches')
@stop
