<?php

namespace App\Controllers;

use App\Views\InfoView;

class InfoController extends Controller
{
	public function show()
	{
		$view = new InfoView();
		$view->render();
	}
}