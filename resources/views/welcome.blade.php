@extends('layouts.app')

@section('content')
    <section class="hero is-primary is-small">
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Age of Empires 2 Team Generator
                </h1>
                <h2 class="subtitle">
                    Generate random teams with random civilizations for Age of Empires 2.
                </h2>
            </div>
        </div>
    </section>

    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a class="nav-item is-tab is-active">Teams</a>
                <a class="nav-item is-tab">Civilizations</a>
            </div>
        </div>
    </nav>

    <teams></teams>
@endsection