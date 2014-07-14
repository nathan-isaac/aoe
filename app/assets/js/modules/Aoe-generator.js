/**
 * Generate teams module
 */
var generator = angular.module('aoe-generate', []);

/**
 * This directive allows us to pass a function in on an enter key to do what we want.
 *
 * Ref: http://ericsaupe.com/angularjs-detect-enter-key-ngenter/
 */
generator.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});

generator.controller('TeamsController', function($scope, $http) {

    /**
     * Default civilizations
     */
    $scope.civilizations = [
        'Britons',
        'Byzanties',
        'Celts',
        'Chinese',
        'Franks',
        'Goths',
        'Huns',
        'Japanese',
        'Koreans',
        'Mongols',
        'Persians',
        'Saracens',
        'Spanish',
        'Teutons',
        'Turks',
        'Vikings'
    ];

    /**
     * Default players
     */
    $scope.players = [
        'Rochelle',
        'Nathan',
        'Marti',
        'Walt',
        'Jef',
        'Erika'
    ];

    /**
     * Teams
     */
    $scope.teams = [];

    /**
     * Default number of teams
     */
    $scope.numOfTeams = 2;

    /**
     * Add player
     */
    $scope.addPlayer = function() {
        $scope.players.push($scope.newPlayer);
        $scope.newPlayer = "";
    };

    /**
     * Remove player
     *
     * @param player
     */
    $scope.removePlayer = function(player) {
        var index = $scope.players.indexOf(player)
        $scope.players.splice(index, 1);
    };

    /**
     * Add civilization
     */
    $scope.addCivilization = function() {
        $scope.civilizations.push($scope.newCivilization);
        $scope.newCivilization = "";
    };

    /**
     * Remove civilization
     *
     * @param civilization
     */
    $scope.removeCivilization = function(civilization) {
        var index = $scope.civilizations.indexOf(civilization)
        $scope.civilizations.splice(index, 1);
    };

    /**
     * Generate random teams with default values
     */
    $scope.init = function() {
        $scope.hideModifyCivsTab();
        $scope.generateRandomTeams();

        $('.view-link').hide();
    };

    /**
     * Generate random teams
     */
    $scope.generateTeams = function() {
        $scope.playRandomTaunt();
        $scope.generateRandomTeams();

        $('.share-link').show();
    };

    /**
     * Play random taunt
     */
    $scope.playRandomTaunt = function() {
        var randomNum = Math.floor(Math.random() * 38) + 1;
        var audio = new Audio('/audio/taunts/'+randomNum+'.mp3');
        audio.play();
    };

    /**
     * Build random teams
     */
    $scope.generateRandomTeams = function() {

        // Clear previous teams
        $scope.teams = [];

        // Randomize civilizations
        var tempCivs = $scope.civilizations.slice(0);
        tempCivs.sort(function() {
            return Math.random() - 0.5;
        });

        // Randomize players
        var tempPlayers = $scope.players.slice(0);
        tempPlayers.sort(function() {
            return Math.random() - 0.5;
        });

        // Create player and civilization array
        var tempCombinedPlayersAndCiv = [];
        var civKey = 0;
        angular.forEach(tempPlayers, function(player, key) {

            var civ = tempCivs[key];

            // Reset civKey if civKey is greater than
            // or equal to tempCivs length
            if(civKey >= tempCivs.length)
            {
                civKey = 0;
            }

            // Check if civilization is defined
            if(angular.isDefined(civ) !== true)
            {
                civ = tempCivs[civKey];
                civKey ++;
            }

            this.push({
                name: player,
                civ: civ
            });

        }, tempCombinedPlayersAndCiv);

        // Get number of players per-team
        var playersPerTeam = $scope.players.length / $scope.numOfTeams;

        // Loop through each team and add them to the teams array
        for(var i=0; i<$scope.players.length; i+=playersPerTeam) {

            var team = tempCombinedPlayersAndCiv.slice(i, i+playersPerTeam);

            $scope.teams.push(team);
        };

        console.log($scope.teams);
    };

    $scope.shareSession = function() {
        var method = "POST";
        var url = '/teams';
        var data = $scope.teams;

        $http.post(url, data).
            success(function(data, status) {
                /*$scope.status = status;
                 $scope.data = data;*/
                console.log(data);

                $scope.hideShareBtn();
                $scope.showViewLink(data.session_link);
            }).
            error(function(data, status) {
                /*$scope.data = data || "Request failed";
                 $scope.status = status;*/
                console.log(data || "Request failed");
            });
    };

    $scope.hideShareBtn = function() {
        $('.share-link').hide();
    };

    $scope.showViewLink = function(linkValue) {
        $('.view-link').show();
        $('.view-link').val(linkValue);
    };

    /**
     * Hide modify civilization tab
     */
    $scope.hideModifyCivsTab = function() {
        $('.edit-civilizations').hide();
        $('.edit-players').show();
        $('.tab-modify-civs').removeClass('active');
        $('.tab-add-players').addClass('active');
    };

    /**
     * Hide add players tab
     */
    $scope.hideAddPlayersTab = function() {
        $('.edit-players').hide();
        $('.edit-civilizations').show();
        $('.tab-add-players').removeClass('active');
        $('.tab-modify-civs').addClass('active');
    };
});