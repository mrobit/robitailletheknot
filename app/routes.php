<?php

Route::get('/', ['uses' => 'PagesController@index', 'as' => 'index']);
Route::get('/details', ['uses' => 'PagesController@details', 'as' => 'details']);
Route::get('/registry', ['uses' => 'PagesController@registry', 'as' => 'registry']);

/**
 * Login/logout routes.
 */
Route::get('auth/login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@create',
]);

Route::post('auth/login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@store',
]);

/**
 * Dashboard
 */
Route::get('dashboard', [
    'before' => 'auth',
    'as'     => 'dashboard_path',
    'uses'   => 'DashboardController@index',
]);

