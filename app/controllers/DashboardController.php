<?php

use Illuminate\Support\Facades\View;

class DashboardController extends \BaseController {

	/**
	 * Display the dashboard.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('dashboard.index');
	}
}
