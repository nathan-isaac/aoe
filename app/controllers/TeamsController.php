<?php

class TeamsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /teams
	 *
	 * @return Response
	 */
	public function index()
	{
		dd(substr(md5(rand()), 0, 20));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /teams/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("teams.create");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /teams
	 *
	 * @return Response
	 */
	public function store()
	{
        // ref: http://stackoverflow.com/questions/1846202/php-how-to-generate-a-random-unique-alphanumeric-string
        // ref: http://stackoverflow.com/questions/853813/how-to-create-a-random-string-using-php
        $session_id = substr(md5(uniqid(rand(), true)), 0, 20);
        $input = Input::all();

        foreach($input as $team_id => $players)
        {
            foreach($players as $player)
            {
                $team = new Teams;
                $team->session_id = $session_id;
                $team->team_id = $team_id;
                $team->player_name = $player['name'];
                $team->player_civ = $player['civ'];
                $team->save();
            }
        }

        return [
            'session_id' => $session_id,
            'session_link' => URL::route('teams.show', $session_id)
        ];
	}

	/**
	 * Display the specified resource.
	 * GET /teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $query = "SELECT max(team_id) as num_of_teams
                    FROM teams
                    WHERE session_id = ?";
        $maxTeams = DB::select($query, [$id]);
        $numOfTeams = $maxTeams[0]->num_of_teams;

        $teams = new \Illuminate\Database\Eloquent\Collection();

        for($i = 0; $i <= $numOfTeams; $i++)
        {
            $team = Teams::whereRaw('session_id = ? AND team_id = ?', [$id, $i])->get();
            $teams->push($team);
        }

        $teams->toArray();

        return View::make('teams.show')->withTeams($teams);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /teams/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}