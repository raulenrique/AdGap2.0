<?php

class InfoView
{
	public function render() {
		$page = "info";
		$page_title = "Info";
		include "templates/master.inc.php";
	}
	public function content() {
		include "templates/info.inc.php";
	}
}