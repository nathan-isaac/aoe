<?php

Route::get('/', ['as' => 'home', function()
{
	return View::make('home');
}]);

Route::resource("teams", "TeamsController",
    ['only' => [ 'create', 'store', 'show' ]]);