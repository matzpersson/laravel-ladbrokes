<?php
// -- API End-points for app and third-party. No Authentication

use Illuminate\Http\Request;

// -- Races
Route::get('races', 'RaceController@index');
Route::get('races/paginate', 'RaceController@paginate');
Route::put('races/{id}', 'RaceController@update');
Route::delete('races/{id}', 'RaceController@delete');
Route::get('races/restart', 'RaceController@restart');

// -- RaceCompetitors
Route::get('competitors/paginate', 'RaceCompetitorController@paginate');
