<template>
    <section class="section">
        <div class="container">

            <nav class="level">
                <!-- Left side -->
                <div class="level-left"></div>

                <!-- Right side -->
                <div class="level-right">
                    <div class="level-item">
                        <p class="control">
                            <span class="icon is-clickable" @click="soundOn = !soundOn">
                                <i class="fa" :class="{'fa-volume-up': soundOn, 'fa-volume-off': !soundOn}"></i>
                            </span>
                        </p>
                    </div>
                    <div class="level-item">
                        <p class="control">
                            <span class="select">
                                <select v-model="numberOfTeams">
                                    <option v-for="number in teamNumbers" :value="number">
                                        {{ number }} team
                                    </option>
                                </select>
                            </span>
                        </p>
                    </div>
                    <div class="level-item">
                        <p class="control">
                            <button class="button is-primary" @click="generateTeams()">Generate</button>
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
                            <div class="control is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" type="text" placeholder="Player name" v-model="newPlayer" @keyup.enter="addPlayer()" autofocus>
                                </p>
                                <p class="control">
                                    <button class="button is-primary is-outlined" @click="addPlayer()">
                                        Add
                                    </button>
                                </p>
                            </div>
                        </div>

                        <div class="panel-block" v-for="(player, index) in players">
                            <div class="columns is-gapless">
                                <div class="column" v-text="player"></div>
                                <div class="column is-2 has-text-right">
                                    <span class="icon is-small is-clickable" @click="removePlayer(index)">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="column">

                    <div class="box">
                        <h1 class="title">Teams</h1>

                        <div class="columns is-multiline">
                            <div class="column is-half-mobile" v-for="(team, index) in teams">
                                <div class="panel">
                                    <p class="panel-heading">
                                        Team {{ index + 1 }}
                                    </p>

                                    <div class="panel-block" v-for="player in team">
                                        <div class="columns is-mobile">
                                            <div class="column">
                                                <strong>{{ player.player }}</strong>
                                            </div>
                                            <div class="column has-text-right">
                                                {{ player.civilization }}
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
</template>

<script>
    export default {
        props: ['civilizations'],
        data() {
            return {
                players: [
                    'Nathan',
                    'Rochelle',
                    'Nick',
                    'Jef',
                    'Erika',
                    'Tim',
                ],
                newPlayer: '',
                teams: [],
                numberOfTeams: 2,
                teamNumbers: [
                    2,3,4,5,6,7,8
                ],
                soundOn: false
            }
        },
        mounted() {
            this.generateTeams();
        },
        methods: {
            removePlayer(index) {
                this.players.splice(index, 1);
            },
            addPlayer() {
                this.players.push(this.newPlayer);
                this.newPlayer = '';
            },
            generateTeams() {
                this.teams = [];

                let civilizations = _.shuffle(this.civilizations);
                let players = _.shuffle(this.players);

                let teamPlayers = _.map(players, function (player, key) {
                    return {
                        civilization: civilizations[key],
                        player: player
                    }
                });

                this.teams = _.chunk(teamPlayers, this.players.length / this.numberOfTeams);

                if (this.soundOn) {
                    this.playTaunt();
                }
            },
            playTaunt() {
                new Audio('/audio/taunts/'+_.random(1, 38)+'.mp3').play();
            }
        }
    }
</script>
