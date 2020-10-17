<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('partials/backend/main');
	}
}
