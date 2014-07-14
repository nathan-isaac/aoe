<!DOCTYPE html>
<html>
<head>
    <?php require __DIR__ . '/../partials/head.php'; ?>
</head>
<body data-ng-app="aoe-generate">
    <section class='fullwidth_container' ng-controller="TeamsController" ng-init="init()">
        <aside class='setup'>
            <div class='tabs'>
                <a class='tab tab-add-players active' ng-click="hideModifyCivsTab()">Add Players</a>
                <a class='tab tab-modify-civs' ng-click="hideAddPlayersTab()">Modify Civs</a>
            </div>

            <div class='edit-players'>
                <div class='form-group'>
                    <input class='form-control form-control_light add-name-field' placeholder='Enter Player Name' type='text' ng-model="newPlayer" ng-enter="addPlayer()">
                </div>
                <div id='players'>
                    <div class='form-group-slim' ng-repeat="player in players track by $index">
                        <input class='form-control' type='text' ng-model="player">
                        <i class='form-control_action fa fa-trash-o' ng-click="removePlayer(player)"></i>
                    </div>
                </div>
            </div>

            <div class='edit-civilizations'>
                <div class='form-group'>
                    <input class='form-control form-control_light add-name-field' placeholder='Enter Civ Name' type='text' ng-model="newCivilization" ng-enter="addCivilization()">
                </div>
                <div id='civilizations'>
                    <div class='form-group-slim' ng-repeat="civilization in civilizations track by $index">
                        <input class='form-control' type='text' ng-model="civilization">
                        <i class='form-control_action fa fa-trash-o' ng-click="removeCivilization(civilization)"></i>
                    </div>
                </div>
            </div>

            <div class='p-bottom'>
                <div class='form-group'>
                    <select class='form-control num-of-teams' ng-model="numOfTeams">
                        <option value='1'>1 team</option>
                        <option value='2' selected>2 teams</option>
                        <option value='3'>3 teams</option>
                        <option value='4'>4 teams</option>
                        <option value='5'>5 teams</option>
                        <option value='6'>6 teams</option>
                        <option value='7'>7 teams</option>
                        <option value='8'>8 teams</option>
                    </select>
                </div>
                <button class='btn-primary gen-btn' type='button' ng-click="generateTeams()">Generate</button>
            </div>
        </aside>
        <article class='content'>
            <header class='hero'>
                <h1 class='hero_heading'><a href="<?php echo URL::route('home'); ?>" class="link">AoE Generator</a></h1>
                <p class='hero_descr'>A custom Age of Empires Team and Civilization Generator.</p>
            </header>
            <section class='teams'>
                <section class="team" ng-repeat="team in teams track by $index">
                    <h3 class="team_name">Team {{ $index + 1 }}</h3>
                    <div class="player" ng-repeat="player in team track by $index">
                        <div class="player_name">{{ player.name }}</div>
                        <div class="civ_name">{{ player.civ }}</div>
                    </div>
                </section>
            </section>

            <section class="footer-content">
                <button type="button" class="btn-info share-link" ng-click="shareSession()">Share Link</button>

                <div class="form-group form-group-slim view-link-container">
                    <input type="text" class="form-control form-control_light view-link" readonly/>
                </div>
            </section>
        </article>
    </section>

    <?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
