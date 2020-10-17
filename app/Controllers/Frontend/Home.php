<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		return view('partials/frontend/main');
	}
}
