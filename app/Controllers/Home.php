<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | Web Pragramming',
			'tes' => ['satu', 'dua', 'tiga']
		];
		return view('pages/home', $data);
	}
}
