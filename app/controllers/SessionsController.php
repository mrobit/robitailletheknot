<?php

use Knot\Users\User;

class SessionsController extends \BaseController {

	/**
	 * Show the login form for the user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	public function store()
	{
		$input = Input::only(['email', 'password']);

		$validation = Validator::make($input, User::$rules);

		if ($validation->fails())
		{
			return Redirect::back()->withErrors($validation);
		}

		if (Auth::attempt($input))
		{
			return Redirect::route('dashboard_path');
		}

		return Redirect::back()->with('errors', "Email or password was incorrect or not found.");
	}
}
