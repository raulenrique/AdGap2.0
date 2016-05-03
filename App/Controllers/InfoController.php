<?php

namespace App\Controllers;

use App\Views\InfoView;

class InfoController 
{
	public function show()
	{
		$view = new InfoView();
		$view->render();
	}
}