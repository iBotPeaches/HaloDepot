@extends('layouts.master')

@section('title', 'Halo Depot > Upload')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Upload a patch
                </h1>
                <h2 class="subtitle">
                    You can upload a patch file from the following patches up to 200mb.
                </h2>
                <div class="content">
                    <ul>
                        <li>.serenity - Halo 2 Xbox</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">
                        <form method="POST" action="{{ route('upload.store') }}" class="box" enctype="multipart/form-data">
                            @csrf

                            @error('patch')
                                <div class="notification is-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="file is-centered is-large is-success has-name is-boxed" id="patch-file-upload">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="patch" accept="file_extension|.serenity">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-file-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a patch...
                                        </span>
                                    </span>
                                    <span class="file-name">
                                        No file uploaded
                                    </span>
                                </label>
                            </div>
                            <br />
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="button is-primary is-fullwidth">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
