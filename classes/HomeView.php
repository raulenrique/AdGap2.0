<?php

class HomeView
{
	private $data;

	public function __construct($data)
	{
		$this->data = $data;
	}
	public function render() 
	{
		extract($this->data);
		$page = "index";
		$page_title = "";
		include "templates/master.inc.php";
	}
	public function content()
	{
		extract($this->data);
		include "templates/index.inc.php";
	}
}