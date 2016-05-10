<?php

namespace App\Controllers;

use App\Views\Error404View;

class Error404Controller 
{
	public function error404()
	{
		$view = new Error404View();
		$view->render();
	}
}