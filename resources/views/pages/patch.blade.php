<?php
    /** @var App\Patch $patch */
?>
@extends('layouts.master')

@section('title', 'Halo Depot > ' . $patch->name)

@section('content')
    <div class="columns">
        <div class="column is-12">
            <section class="hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            {{ $patch->name }}
                            <span class="tag is-info">{{ $patch->game->description }}</span>
                        </h1>
                        <h2 class="subtitle">
                            {{ $patch->author }}
                        </h2>
                    </div>
                </div>
            </section>
            <section>
                <div class="columns is-gapless is-flex align-columns">
                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="{{ $patch->image() }}" alt="{{ $patch->name }} preview image" />
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="column is-9 notification">
                        <div class="tile is-child notification">
                            {{ $patch->description }}
                            <hr />
                            <div class="field is-grouped is-grouped-multiline">
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag is-dark">map</span>
                                        <span class="tag is-info">{{ $patch->map }}</span>
                                    </div>
                                </div>
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag is-dark">patch</span>
                                        <span class="tag is-info">{{ $patch->patch->getExtension() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="columns is-centered">
        <div class="column is-half">
            <a href="{{ route('patch.download', [$patch]) }}" class="button is-fullwidth is-success">
                Download {{ $patch->name }}
            </a>
        </div>
    </div>
@stop
