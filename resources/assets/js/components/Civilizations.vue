<template>
    <section class="section">
        <div class="container">

            <div class="columns">
                <div class="column column is-half is-offset-one-quarter">

                    <div class="panel">
                        <p class="panel-heading">
                            Civilizations
                        </p>

                        <div class="panel-block">
                            <div class="control is-grouped">
                                <p class="control is-expanded">
                                    <input class="input" type="text" placeholder="Civilization name" v-model="newCivilizations" @keyup.enter="addCivilization()" autofocus>
                                </p>
                                <p class="control">
                                    <button class="button is-primary is-outlined" @click="addCivilization()">
                                        Add
                                    </button>
                                </p>
                            </div>
                        </div>

                        <div class="panel-block" v-for="(civilization, index) in civilizations">
                            <div class="columns is-gapless">
                                <div class="column" v-text="civilization"></div>
                                <div class="column is-2 has-text-right">
                                    <span class="icon is-small is-clickable" @click="removeCivilization(index)">
                                        <i class="fa fa-trash"></i>
                                    </span>
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
                newCivilizations: ''
            }
        },
        methods: {
            removeCivilization(index) {
                this.civilizations.splice(index, 1);
                Event.fire('modifiedCivilization', this.civilizations);
            },
            addCivilization() {
                this.civilizations.push(this.newCivilizations);
                this.newCivilizations = '';
                Event.fire('modifiedCivilization', this.civilizations);
            },
        }
    }
</script>
