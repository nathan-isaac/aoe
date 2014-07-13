<?php

class Teams extends \Eloquent {
	protected $fillable = [
        'session_id',
        'team_id',
        'player_name',
        'player_civ'
    ];
}