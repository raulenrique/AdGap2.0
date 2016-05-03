<?php

class InfoView extends TemplateView
{
	public function render() {
		$page = "info";
		$page_title = "Info";
		include "templates/master.inc.php";
	}
	protected function content() {
		include "templates/info.inc.php";
	}
}