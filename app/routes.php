<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource("teams", "TeamsController",
    ['only' => [
            'create',
            'show'
        ]
    ]);