<?php

Route::get('/', ['uses' => 'PagesController@index', 'as' => 'index']);
Route::get('/details', ['uses' => 'PagesController@details', 'as' => 'details']);
Route::get('/registry', ['uses' => 'PagesController@registry', 'as' => 'registry']);
