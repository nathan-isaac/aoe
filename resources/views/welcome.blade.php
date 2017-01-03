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
                <a class="nav-item is-tab" :class="{'is-active': teamTab}" @click="teamTab = true">Teams</a>
                <a class="nav-item is-tab" :class="{'is-active': !teamTab}" @click="teamTab = false">Civilizations</a>
            </div>
        </div>
    </nav>

    <teams :civilizations="civilizations" v-show="teamTab"></teams>
    <civilizations :civilizations="civilizations" v-show="!teamTab"></civilizations>

    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Age of Empires 2 Team Generator</strong> by <a href="http://nathanisaac.io">Nathan Isaac</a>. The source code is licensed
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
                </p>
                <p>
                    <a class="icon" href="https://github.com/nisaac2fly/aoe">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
            </div>
        </div>
    </footer>

@endsection