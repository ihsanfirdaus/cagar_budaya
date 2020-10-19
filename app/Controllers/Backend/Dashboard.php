<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('partials/backend/main');
	}
}
