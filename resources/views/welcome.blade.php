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

    <section class="section">
        <div class="container">

            <nav class="level">
                <!-- Left side -->
                <div class="level-left">

                </div>


                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <p class="control">
                            <span class="icon">
                                <i class="fa fa-volume-up"></i>
                            </span>
                        </p>
                    </div>
                    <div class="level-item">
                        <p class="control">
                            <span class="select">
                                <select>
                                    <option>2 teams</option>
                                    <option>3 teams</option>
                                    <option>4 teams</option>
                                    <option>5 teams</option>
                                    <option>6 teams</option>
                                    <option>7 teams</option>
                                    <option>8 teams</option>
                                </select>
                            </span>
                        </p>
                    </div>
                    <div class="level-item">
                        <p class="control">
                            <button class="button is-primary">Generate</button>
                        </p>
                    </div>
                </div>
            </nav>

            <div class="columns">
                <div class="column is-one-third">

                    <div class="panel">
                        <p class="panel-heading">
                            Players
                        </p>

                        <div class="panel-block">
                            <div class="columns is-gapless">
                                <div class="column">
                                    Nathan
                                </div>
                                <div class="column is-2 has-text-right">
                                    <span class="icon is-small">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="panel-block">
                            <div class="control is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" type="text" placeholder="Player name">
                                </p>
                                <p class="control">
                                    <a class="button is-primary is-outlined">
                                        Add
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>




                <div class="column">

                    <div class="box">
                        <h1 class="title">Teams</h1>

                        <div class="columns is-multiline">
                            <div class="column is-one-quarter">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team 1
                                    </p>

                                    <div class="panel-block">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>Nathan</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                Civ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-one-quarter">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team 2
                                    </p>

                                    <div class="panel-block">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>Rochelle</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                Civ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="column is-one-quarter">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team 2
                                    </p>

                                    <div class="panel-block">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>Rochelle</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                Civ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="column is-one-quarter">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team 2
                                    </p>

                                    <div class="panel-block">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>Rochelle</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                Civ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="column is-one-quarter">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team 2
                                    </p>

                                    <div class="panel-block">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>Rochelle</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                Civ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection